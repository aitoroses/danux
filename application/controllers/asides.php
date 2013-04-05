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
				//$result = $module->to_array();

				return $accints= $module->accints()->get();

			}, $modules);
//    		$modules = $wardrobe->modules->accints->get();
			return View::make('asides.accesorios_interior')->with('accint', $accesory_groups);

        	break;
    	}
	}
}