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
        // Configure as a Parent first (is an array)
        if(!isset($module["configuration"]["type"]["relationships"])){
            $module["configuration"]["type"]["relationships"] = array();
        }
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

    public function rebuild_for_client() {
        $modules = $this->modules()->get();
        $doors = $this->doors()->get();
        $accext = $this->accexts()->get();
        // Arrays
        // modules
        $modules_array = array_map(function($object){
            // Rebuild the childs
            $object->rebuild_submodules();
            // Rebuild the module itself
            $object_array = $object->rebuild_module();
            return $object_array;
        }, $modules);
        // Doors
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

        $json = array(
            'data' => $this->to_array(),
            'modules' => $modules_array,
            'doors' => $doors_array,
            'accext' => $accext,


        );
    }

}