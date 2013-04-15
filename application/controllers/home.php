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

		$budget = Auth::user()->budgets()->first();
		if($budget){
			$wardrobes = $budget->wardrobe()->get();
		}
		if(!isset($wardrobes)){
			$wardrobes = null;
		}
		
		if(Session::get('wardrobe_id') == null) {
			$id_wardrobe = "";
		} else {
			$id_wardrobe = Session::get('wardrobe_id');
		}
		return View::make('home.tab'.$id)
			->with('title','Paso '.$id.' Creacion de armario. Semiems')
			->with('username',Auth::user()->username)
			->with('id',$id)
			->with('id_wardrobe', $id_wardrobe)
			->with('wardrobes', $wardrobes)
			->with('role',Auth::user()->type_user);

	}

	public function post_session($id){
		Session::put('wardrobe_id', $id);
		return $id;
	}

}