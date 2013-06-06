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

    	// Check type of parentness
    	if($conf["type"]->parentness == 'child') {
    		// Is child, return NULL
    		return null;
    	} else {
    		// is parent, return childs array
            if($conf["type"]->relationships == array()){
                return array();
            }
    		$childs = Module::where_in('id', $conf["type"]->relationships)->get();
    	}
    	// Return array of childs, else return null object (parent case)
    	return $childs;
    }

    public function set_childs($childs_array) {
        if ($childs_array != null){
        	// Obtain childs id
        	$child_ids = array_map(function($module){
        		return $module->id;
        	}, $childs_array);
            // Create configuration
            $conf = array('type' => array('parentness' => 'parent', 'relationships' => $child_ids));
        } else {
            $conf = array('type' => array('parentness' => 'parent', 'relationships' => array()));
        }
    	$this->configuration = json_encode($conf);
    	// Save
        //return print_r($this);
    	$this->save();
    }

    public function set_parent($id) {
    	// Obtain parent id
    	$parent_id = $id;
    	// Create configuration
    	$conf = array('type' => array('parentness' => 'child', 'relationships' => $parent_id));
    	$this->configuration = json_encode($conf);
    	// Save
    	$this->save();
    }

    public function rebuild_submodules(){
        // Get the childs and if its parent
        $configuration = object_to_array(json_decode($this->configuration));
        if($configuration["type"]["parentness"] == "parent"){
            $child_ids = $configuration["type"]["relationships"];
            $childs_array = null;
            if(sizeof($child_ids) > 0){       
                $childs = Module::where_in('id', $child_ids)->get();
                // Rebuild the childs
                $childs_array = array_map(function($child){
                    $child->rebuild_module();
                    // New configuration
                    $conf = object_to_array(json_decode($child->configuration));
                    $child->new_conf('child', $conf["type"]["relationships"]);
                    return $child->to_array();
                },$childs);
            } else {
                // Parent has no childs
                $childs_array = array();
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
        $this->accint = $accints_ids;
        $module_array = $this->to_array();
        return $module_array;
    }

    public function new_conf($parentness, $modules_as_array){
        $conf = object_to_array(json_decode($this->configuration, JSON_NUMERIC_CHECK));
        $conf["type"]["parentness"] = $parentness;
        $conf["type"]["relationships"] = $modules_as_array;
        $this->configuration = $conf;
    }

}

