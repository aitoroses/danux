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
			$wardrobe = $budget->wardrobe()->first();
			if($wardrobe) {
				$id_wardrobe = $wardrobe->id;
			}
		} else { 
			$id_wardrobe = "";
		}
		return View::make('home.tab'.$id)
			->with('title','Paso '.$id.' Creacion de armario. Semiems')
			->with('username',Auth::user()->username)
			->with('id',$id)
			->with('id_wardrobe', $id_wardrobe);

	}

}