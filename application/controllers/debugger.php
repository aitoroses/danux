<?php

class Debugger_Controller extends Base_Controller {

	public $restful = true;

	public function get_wardrobe() {
		//Get some childs
		$wardrobe = Wardrobe::rebuild_for_client(1);
		print_r($wardrobe);
		return Response::json($wardrobe);
	}

	public function get_module() {
		$module = Module::find(2);
		// Testing submodules
		$module->rebuild_submodules();
		return Response::json($module->to_array());
	}

	public function get_savemodule(){
		$json = object_to_array(json_decode('{"id":"","wardrobe_id":"2","double":"1","ddouble":"493","width":"823","height":"1234","ref1":"0","ref2":"0","configuration":{"type":{"parentness":"parent","relationships":[{"id":"3","wardrobe_id":"0","double":"0","ddouble":"0","width":"493","height":"1234","ref1":"0","ref2":"0","configuration":{"type":{"parentness":"child","relationships":"2"}},"module_id":"0","created_at":"2013-05-16 19:13:50","updated_at":"2013-05-16 19:13:50"},{"id":"4","wardrobe_id":"0","double":"0","ddouble":"0","width":"330","height":"1234","ref1":"0","ref2":"0","configuration":{"type":{"parentness":"child","relationships":"2"}},"module_id":"0","created_at":"2013-05-16 19:13:50","updated_at":"2013-05-16 19:13:50"}]}},"module_id":"0","created_at":"2013-05-16 19:13:33","updated_at":"2013-05-16 19:15:12"}'));
		return print_r(Wardrobe::rebuild_from_client($json));
	}
	public function get_save(){
		$wardrobe = Wardrobe::find(1);
		$json=object_to_array(json_decode('{"id":"2","wardrobe_id":"1","double":"1","ddouble":"534","width":"823","height":"1234","ref1":"0","ref2":"0","configuration":{"type":{"parentness":"parent","relationships":[{"id":"3","wardrobe_id":"0","double":"0","ddouble":"0","width":"534","height":"1234","ref1":"0","ref2":"0","configuration":{"type":{"parentness":"child","relationships":"2"}},"module_id":"0","created_at":"2013-05-16 19:28:14","updated_at":"2013-05-16 19:28:14"},{"id":"4","wardrobe_id":"0","double":"0","ddouble":"0","width":"289","height":"1234","ref1":"0","ref2":"0","configuration":{"type":{"parentness":"child","relationships":"2"}},"module_id":"0","created_at":"2013-05-16 19:28:14","updated_at":"2013-05-16 19:28:14"}]}},"module_id":"0","created_at":"2013-05-16 19:27:15","updated_at":"2013-05-16 19:28:14"}'));
		return print_r($wardrobe->save_module_and_accesories($json));
	}

}