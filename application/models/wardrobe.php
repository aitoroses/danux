<?php

class Wardrobe extends Eloquent 
{
	public static $table = 'l_wardrobe_table';

    public static $rules = array(
        'name' => 'required|min:3',
        'width' => 'required|numeric|min:500|max:5000',
        'height' => 'required|numeric|min:500|max:3000',
        'prof' => 'required|numeric|min:300|max:680',
        'typedoor' => 'required|in:0,1,2'
    );

    public static function validate($data){
        return Validator::make($data, static::$rules);
    }

	public function modules()
    {
        return $this->has_many('module');
    }

    public function doors()
    {
        return $this->has_many('door');
    }

    public function accexts()
    {
        return $this->has_many_and_belongs_to('accext', 'l_accext_wardrobe_relation_table');
    }

    public function save_module_and_accesories($module) {
        // We first get the conf
        $conf = $module["configuration"];
        // Now we have to check if there are relationships (modules)
        if(!isset($conf["type"]["relationships"])){
            // Fixes the problem with the json coming from the client with empty array
            $conf["type"]["relationships"] = array();
        }
        $relationships = $conf["type"]["relationships"];
        if(sizeof($relationships) > 0){
            // if there are relations
            // We have to erase existing child modules
            $mod_ant=Module::find($module["id"]);
            //get past configuration
            $conf_ant = object_to_array(json_decode($mod_ant->configuration));
            if(isset($conf_ant["type"]["relationships"])){
                $relations = $conf_ant["type"]["relationships"];
                if(sizeof($relations) > 0){
                    $array = Module::where_in('id', $relations)->get();  
                    foreach ($array as $ele) {
                        $ele->delete();
                    }
                    //Ou yeah
                }
            }
            // Now, we have to save that new child modules
            // we also need the new relations
            $new_relations = array();
            foreach ($relationships as $child) {
                $child["configuration"] = json_encode($child["configuration"]);
                //extraemos los accesorio
                if(isset($child["accint"])){
                    // si existe el array 
                    $accs_int_temp = $child["accint"];
                    //extraigo el array
                    unset($child["accint"]);
                }else{
                    $accs_int_temp = [];
                }
                $child_model = Module::create($child);
                // Childs have parents id
                    // Borro lo que hay por seguridad
                    // sino 'sync' hace cosas raras cuando guardas un ID que ya esta en la BD
                    // Asi funciona bien
                    $child_model->accints()->delete();
                    $child_model->accints()->sync($accs_int_temp);
                $child_model->set_parent($module["id"]);
                $new_relations[] = $child_model->id;  
            }

            // we now use this new relations to link parent-child
            // parent-child object linking ids

            $module["configuration"]["type"]["relationships"] = $new_relations;
        } else {
            // delete database childs (Past relationships)
            // Find and destroy childs in database
            $mod_ant=Module::find($module["id"]);
            //get past configuration
            $conf_ant = object_to_array(json_decode($mod_ant->configuration));
            if(isset($conf_ant["type"]["relationships"])){
                $relations = $conf_ant["type"]["relationships"];
                if(sizeof($relations) > 0){
                    $array = Module::where_in('id', $relations)->get();  
                    foreach ($array as $ele) {
                        $ele->delete();
                    }
                    //Ou yeah
                }
            }
              
            $module["configuration"]["type"]["relationships"] = array();
        }
        // Convert to string configuration for saveing
        $module["configuration"] = json_encode($module["configuration"]);
        $module_model = null;
        // Save the accesories for the module
        if($module != null){
            if(isset($module["accint"])){
                // si existe el array 
                $accs_int = $module["accint"];
                //extraigo el array
                unset($module["accint"]);
                //actualizo modelo          
                Module::update($module["id"], $module);
                //Guardado de materiales
                $module_model = Module::find($module["id"]); 
                // Borro lo que hay por seguridad
                // sino 'sync' hace cosas raras cuando guardas un ID que ya esta en la BD
                // Asi funciona bien
                $module_model->accints()->delete();
                $module_model->accints()->sync($accs_int);
            }else{
                Module::update($module["id"], $module);
                //si no estan definidos los accesorios los borro de la base de datos
                // esto soluciona el problema de que quites todos los accesorios y guardes
                // asi todo OK
                $module_model = Module::find($module["id"]); 
                $module_model->accints()->delete();
            }
        }

        return $module_model;
    }
    // STATIC METHOD FOR BUILDING THE WARDROBE
    public static function rebuild_for_client($id) {
        $wardrobe = Wardrobe::find($id);
        $modules = $wardrobe->modules()->get();
        $doors = $wardrobe->doors()->get();
        $accext = $wardrobe->accexts()->get();
        // Arrays
        // modules
        $modules_array = array_map(function($object){
            // Rebuild the childs
            $object->rebuild_submodules();
            // Rebuild the parent
            $rebuilt = $object->rebuild_module();
            return $rebuilt;
        }, $modules);
        $doors_array = array_map(function($object){
            // Obtenemos los materiales de cada puerta
            $materials = $object->materials()->get();
            // Obtenemos los identificadores de las puertas
            $materialdoor = DB::table('l_door_material_relation_table')->where_door_id($object->id)->get();
            //componemos el array de salida
            $materials_ids = array_map(function($material){
                return intval($material->doormaterial_id);
            }, $materialdoor);

            $result = $object->to_array();
            $result["material"] = $materials_ids;
            
            return $result;
        }, $doors);

        $accext_array = array_map(function($object){
            return $object->id;
        }, $accext);

        $json = array(
            'data' => $wardrobe->to_array(),
            'modules' => $modules_array,
            'doors' => $doors_array,
            'accext' => $accext_array,
        );
        return $json;
    }
    public static function rebuild_from_client($json_wardrobe){
        // Necesitamos descomponer el armario
        $wardrobe_array = object_to_array($json_wardrobe);
        $id = $wardrobe_array["data"]["id"];
        $wardrobe = Wardrobe::find($id);
        // UPDATE DATA
        Wardrobe::update($id, $wardrobe_array["data"]);
        // UPDATE MODULES
        foreach ( $wardrobe_array["modules"] as $module) {
            // Save the parent module
            $parent_module = $wardrobe->save_module_and_accesories($module);
        }
        // UPDATE DOORS
        array_map(function($door){
            if(isset($door["material"])){ 
                //si existen los materiales
                $materials = $door["material"];
                //extraemos el array
                unset($door["material"]); 
                //Actualizamos el modelo
                Door::update($door["id"], $door);
                //guardamos los materiales
                $door_model = Door::find($door["id"]);
                //por seguridad borro lo que hay sino hay problemas
                $door_model->materials()->delete();
                $door_model->materials()->sync($materials);
            }else{
                Door::update($door["id"], $door);
                //si no estan definidos los materiales los borro de la base de datos
                // esto soluciona el problema de que quites todos los materiales y guardes
                // asi todo OK
                $door_model = Door::find($door["id"]);
                $door_model->materials()->delete();
            }

        }, $json_wardrobe["doors"]);

        // UPDATE ACCEXT
        if(isset($json_wardrobe["accext"])){ 
            //si existen los materiales
            $accs_ext = $json_wardrobe["accext"];
            $wardrobe_model = Wardrobe::find($id);
            $wardrobe_model->accexts()->delete();
            $wardrobe_model->accexts()->sync($accs_ext);
        }else{
            $wardrobe_model = Wardrobe::find($id);
            $wardrobe_model->accexts()->delete();
        }
        return true;
    }
}
