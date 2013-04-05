<?php

class Asides_Controller extends Base_Controller {

	public $restful = true;

	// BUDGET
	public function get_aside($name){
		switch ($name) {
    		case "getAccInt":
    		$id_wardrobe = Session::get('wardrobe_id');
    		$wardrobe = Wardrobe::find($id_wardrobe);

    		$modules = $wardrobe->modules()->get();
			// Obtenemos los identificadores
			$accesory_groups = array_map(function($module){
				return $accints= $module->accints()->get();
			}, $modules);
			return View::make('asides.accesorios_interior')->with('accint', $accesory_groups);

        	break;
    	}
	}
}