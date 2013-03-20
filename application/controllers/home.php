<?php

class Home_Controller extends Base_Controller {

	public $restful = true;    


	public function get_index()
	{
		return View::make('home.tab1');
	}

	public function get_tab($id)
	{
		return View::make('home.tab'.$id);
	}

}