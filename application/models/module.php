<?php

class Module extends Eloquent 
{
	public static $table = 'l_modules_table';

    public function accints()
    {
        return $this->has_many_and_belongs_to('accint', 'l_accint_module_relation_table');
    }

    public function get_childs() {
    	$conf = getConf();
    	// Check type of parentness
    	if($conf["type"]["parentness"] == 'child') {
    		// Is child, return NULL
    		return null;
    	} else {
    		// is parent, return childs array
    		$childs = Module::where_in('id', $conf["type"]["relationships"]);
    	}
    	// Return array of childs, else return null object (parent case)
    	return $childs;
    }
    public function get_parent() {
    	$conf = getConf();
    	// Check type of parentness
    	if($conf["type"]["parentness"] == 'child') {
    		// Is child, return parent
    		$parent = Module::find($conf["type"]["relationships"]);
    	} else {
    		// is parent, return NULL
    		return null;
    	}
    	return $parent;
    }
    public function set_childs($childs_array) {
        if ($childs_array != null){
        	// Obtain childs id
        	$child_ids = array_map(function($module){
        		return $module->id;
        	}, $childs_array);
            // Create configuration
            $conf = array('type' => array('parentness' => 'parent', 'relationships' => json_encode($child_ids)));
        } else {
            $conf = array('type' => array('parentness' => 'parent', 'relationships' => json_encode([])));
        }
    	$this->configuration = json_encode($conf);
    	// Save
        //return print_r($this);
    	$this->save();
    }
    public function set_parent($parent) {
    	// Obtain parent id
    	$parent_id = $parent->id;
    	// Create configuration
    	$conf = array('type' => array('parentness' => 'child', 'relationships' => json_encode($parent_id)));
    	$this->configuration = $conf;
    	// Save
    	$this->save();
    }

    public function save_childs($childs, $wardrobe){
        $child_ids = [];
        foreach ($childs as $child) {
            // Save the child
            $child_module = $wardrobe->save_module_and_accesories($child);
            // Configure the child
            $child_module->set_parent($this);
            // Return the id
            $id = $child;
            $child_ids[] = $id;
        }
    	// Set this parent
    	$this->set_childs($child_ids);
    }

    public function rebuild_submodules(){
        // Get the childs and if its parent
        $configuration = json_decode($this->configuration);
        // is stdClass Object
        if($configuration->type->parentness == "parent"){
            $child_ids = (array) json_decode($configuration->type->relationships);
            if(sizeof($child_ids)> 0){
                $childs = Module::where_in('id', $child_ids)->get();
                // Rebuild the childs
                $childs_array = array_map(function($child){
                    return $child->rebuild_module();
                },$childs);
            } else {
                $childs_array = [];
            }
            // return
           $relationships = $childs_array;
            // this are a stdCass we need array
            $type = (array) $configuration->type;
            $type["relationships"] = $relationships;
            $configuration->type = $type;
            $this->configuration = (array) $configuration;
            return true;
        } else {
            // Is child
        }
        return false;
    }
    public function rebuild_module(){
        // Converts a module object to a client
        $module_array = $this->to_array();
        //Accesorios
        $accints = $this->accints()->get();
        // Obtenemos los identificadores
        $accints_ids = array_map(function($accint){
            return $accint->id;
        }, $accints);
        // Meterlos en el Arrayyyy
        $module_array = $this->to_array();
        $module_array["accint"] = $accints_ids;
        return $module_array;
    }

    private function getConf(){
		// Get configuration
		$conf = $this->configuration;
		// Build the json object
		$conf = json_decode($conf);
		return $conf;
	}

}

