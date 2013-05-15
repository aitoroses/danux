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
		return Response::json($module->rebuild_submodules());
	}

	public function get_savemodule(){
		$json = json_decode('{"data":{"id":"1","budget_id":"1","name":"asdf","width":"2500","height":"1234","prof":"680","nmods":"3","doors":"5","typedoor":"1","paritypos":"1","handle":"0","tperfil":"3","perfil":"0","marco":"141","created_at":"2013-05-15 15:34:47","updated_at":"2013-05-15 15:43:13"},"modules":[{"id":"1","wardrobe_id":"1","double":"0","ddouble":"0","width":"500","height":"1234","ref1":"0","ref2":"0","configuration":{"type":{"parentness":"parent","relationships":[{"id":"2","wardrobe_id":"1","double":"0","ddouble":"0","width":"1000","height":"1234","ref1":"0","ref2":"0","configuration":{"type":{"parentness":"child","relationships":[]}},"created_at":"2013-05-15 15:34:47","updated_at":"2013-05-15 15:43:13"},{"id":"3","wardrobe_id":"1","double":"0","ddouble":"0","width":"1000","height":"1234","ref1":"0","ref2":"0","configuration":{"type":{"parentness":"child","relationships":[]}},"created_at":"2013-05-15 15:34:47","updated_at":"2013-05-15 15:43:13"}]}},"created_at":"2013-05-15 15:34:47","updated_at":"2013-05-15 15:43:13","accint":[]},{"id":"2","wardrobe_id":"1","double":"0","ddouble":"0","width":"1000","height":"1234","ref1":"0","ref2":"0","configuration":{"type":{"parentness":"parent","relationships":[]}},"created_at":"2013-05-15 15:34:47","updated_at":"2013-05-15 15:43:13","accint":[]},{"id":"3","wardrobe_id":"1","double":"0","ddouble":"0","width":"1000","height":"1234","ref1":"0","ref2":"0","configuration":{"type":{"parentness":"parent","relationships":[]}},"created_at":"2013-05-15 15:34:47","updated_at":"2013-05-15 15:43:13","accint":[]}],"doors":[{"id":"1","wardrobe_id":"1","type":"3","created_at":"2013-05-15 15:34:47","updated_at":"2013-05-15 15:43:13","material":[0,156,0]},{"id":"2","wardrobe_id":"1","type":"3","created_at":"2013-05-15 15:34:47","updated_at":"2013-05-15 15:43:13","material":[0,156,156]},{"id":"3","wardrobe_id":"1","type":"1","created_at":"2013-05-15 15:34:47","updated_at":"2013-05-15 15:43:13","material":[]},{"id":"4","wardrobe_id":"1","type":"1","created_at":"2013-05-15 15:34:47","updated_at":"2013-05-15 15:43:13","material":[]},{"id":"5","wardrobe_id":"1","type":"1","created_at":"2013-05-15 15:34:47","updated_at":"2013-05-15 15:43:13","material":[]}],"accext":[{"attributes":{"id":"1","desc":"Colunmas","points":"150","type":"1","proveedor":"0","ref":"","img":"","created_at":"2013-05-15 15:05:17","updated_at":"2013-05-15 15:05:17"},"original":{"id":"1","desc":"Colunmas","points":"150","type":"1","proveedor":"0","ref":"","img":"","created_at":"2013-05-15 15:05:17","updated_at":"2013-05-15 15:05:17"},"relationships":{"pivot":{"attributes":{"id":"1","created_at":"2013-05-15 15:43:13","updated_at":"2013-05-15 15:43:13","wardrobe_id":"1","accext_id":"1"},"original":{"id":"1","created_at":"2013-05-15 15:43:13","updated_at":"2013-05-15 15:43:13","wardrobe_id":"1","accext_id":"1"},"relationships":[],"exists":true,"includes":[]}},"exists":true,"includes":[]}]}');
		return print_r(Wardrobe::rebuild_from_client($json));
	}

}