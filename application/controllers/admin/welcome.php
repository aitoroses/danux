<?php

class Admin_Welcome_Controller extends Admin_Controller {

	public $restful = true;

	public function get_index()
		{
			return View::make('admin.welcome',$this->data)
				->with('title','Administra los distribuidores');
		}
}