<?php

class Home_Controller extends Base_Controller {

	public $restful = true;    


	public function get_index()
	{
		return View::make('home.login')
			->with('title','Semiems. Crea tu propio armario.');
	}

	public function get_tab($id)
	{
		return View::make('home.tab'.$id)
			->with('title','Paso '.$id.' Creacion de armario. Semiems')
			->with('username',Auth::user()->username)
			->with('id',$id);

	}

}