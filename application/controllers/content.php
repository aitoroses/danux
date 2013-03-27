<?php
Class Content_Controller extends Base_Controller{
	
	public $restful = true;

	public function get_module($id){
		//$module = DB::table('b_modules')->find($id);
		return 'semiems/contenido/Bibliotecas/modulos/'.$id.'.png';
	}
}