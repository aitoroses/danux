<?php

class Debugger_Controller extends Base_Controller {

	public $restful = true;

	public function get_wardrobe() {
		//Get some childs
		$wardrobe = Wardrobe::rebuild_for_client(1);
		//print_r($wardrobe);
		return Response::json($wardrobe);
	}

	public function get_module() {
		$module = Module::find(1);
		// Testing submodules
		$module->rebuild_submodules();
		return Response::json($module->to_array());
	}

	public function get_savemodule(){
		$json = json_decode('{"data":{"id":"1","budget_id":"1","name":"rap","width":"2500","height":"1234","prof":"680","nmods":"3","doors":"5","typedoor":"1","paritypos":"1","handle":"0","tperfil":"3","perfil":"0","marco":"141","created_at":"2013-05-15 15:34:47","updated_at":"2013-05-15 18:58:08"},"modules":[{"id":"1","wardrobe_id":"1","double":"0","ddouble":"0","width":"500","height":"1234","ref1":"0","ref2":"0","configuration":{"type":{"parentness":"parent","relationships":[{"id":"2","wardrobe_id":"1","double":"0","ddouble":"0","width":"1000","height":"1234","ref1":"0","ref2":"0","configuration":{"type":{"parentness":"child","relationships":[]}},"module_id":"0","created_at":"2013-05-15 15:34:47","updated_at":"2013-05-15 18:58:08"}]}},"module_id":"0","created_at":"2013-05-15 15:34:47","updated_at":"2013-05-15 18:58:08","accint":[]},{"id":"2","wardrobe_id":"1","double":"0","ddouble":"0","width":"1000","height":"1234","ref1":"0","ref2":"0","configuration":{"type":{"parentness":"parent","relationships":[]}},"module_id":"0","created_at":"2013-05-15 15:34:47","updated_at":"2013-05-15 18:58:08","accint":[]}],"doors":[{"id":"1","wardrobe_id":"1","type":"1","created_at":"2013-05-15 18:57:27","updated_at":"2013-05-15 18:57:27","material":[]},{"id":"2","wardrobe_id":"1","type":"1","created_at":"2013-05-15 18:57:27","updated_at":"2013-05-15 18:57:27","material":[]},{"id":"3","wardrobe_id":"1","type":"1","created_at":"2013-05-15 18:57:27","updated_at":"2013-05-15 18:57:27","material":[]}],"accext":[]}');
		return print_r(Wardrobe::rebuild_from_client($json));
	}

}