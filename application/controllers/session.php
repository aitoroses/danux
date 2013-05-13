<?php

Class Session_Controller extends Base_Controller {
	
	public $restful = true;

	public function post_set($variable, $value){
		Session::put($variable, $value);
	}
	public function get_flush(){
        Session::forget('wardrobe_id');
    }
    public function post_session($id){
		Session::put('wardrobe_id', $id);
		return $id;
	}
}
