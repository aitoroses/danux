<?php

Class Session_Controller extends Base_Controller {
	
	public $restful = true;

	public function post_set($variable, $value){
		Session::put($variable, $value);
	}

}
