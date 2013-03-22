<?php

class Home_Controller extends Base_Controller {

	public $restful = true;    


	public function get_index()
	{
		return View::make('home.tab1')
			->with('title','Paso 1 Creacion de armario. Semiems')
			->with('id', 1);
	}

	public function get_tab($id)
	{
		return View::make('home.tab'.$id)
			->with('title','Paso '.$id.' Creacion de armario. Semiems')
			->with('id',$id);

	}

}