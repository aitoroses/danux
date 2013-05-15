<?php

class Module extends Eloquent 
{
	public static $table = 'l_modules_table';

    // Relationships

    public function accints()
    {
        return $this->has_many_and_belongs_to('accint', 'l_accint_module_relation_table');
    }

    // Static Methods

    public static function create_child() {
    
    }

    // Non-Static methods

    public function getConf(){
        // Get configuration
        $conf = $this->configuration;
        // Build the json object
        $conf = (array) json_decode($conf);
        return $conf;
    }

    public function get_childs() {
    	$conf = $this->getConf();
        return;
    	// Check type of parentness
    	if($conf["type"]["parentness"] == 'child') {
    		// Is child, return NULL
    		return null;
    	} else {
    		// is parent, return childs array
    		$childs = Module::where_in('id', $conf["type"]["relationships"])->get();
    	}
    	// Return array of childs, else return null object (parent case)
    	return $childs;
    }

    public function get_parent() {
    	$conf = $this->getConf();
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
        // Refreshing the childs
        // delete actual childs
        $childs_to_delete = $this->get_childs();
        
        if($childs_to_delete != NULL) {
           foreach ($childs_to_delete as $child) {
                $child->delete();
            } 
        }
        // Insert new childs
        foreach ($childs as $child) {
            // Create a child in the DB
            $child = Module::insert($child);
            // Save the child
            //$child_module = $wardrobe->save_module_and_accesories($child);
            // Configure the child
            //$child_module->set_parent($this);
            // Return the id
            $id = $child->id;
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
            $child_ids = json_decode($configuration->type->relationships);
            $childs_array = null;          
            if(sizeof($child_ids) > 0){
                $childs = Module::where_in('id', $child_ids)->get();
                // Rebuild the childs
                $childs_array = array_map(function($child){
                    $child->rebuild_module();
                    // New configuration
                    $conf = json_decode($child->configuration);
                    $conf->type->parentness = 'child';
                    $conf->type->relationships = json_decode($conf->type->relationships);
                    $child->configuration = $conf;
                    return $child->to_array();
                },$childs);
            } else {
                // Parent has no childs
                $childs_array = [];
            }
            // $childs_array contains the relationships for client
            $this->new_conf('parent', $childs_array);
            return;
        } else {
            // Is child
            return;
        }
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

    public function new_conf($parentness, $modules_as_array){
        $conf = json_decode($this->configuration);
        $conf->type->parentness = $parentness;
        $conf->type->relationships = $modules_as_array;
        $this->configuration = $conf;
    }

}

