<?php

class Home_Controller extends Base_Controller {

	public $restful = true;   


	public function get_index()
	{
		return View::make('home.login')
			->with('title','Semiems. Crea tu propio armario.');
	}

	public function get_coupon(){

        return View::make('home.coupon');
    }

    public function get_confirm(){

    	$username = Session::get('username');
    	$password = Session::get('password');

    	$coupon = Input::get('coupon');

    	Session::put('coupon', $coupon);

    	$distribuidor = DB::table('l_distributors_table')
    		->where('coupon', '=', $coupon)->first();

    	return View::make('home.confirm')
    		->with('username', $username)
    		->with('password', $password)
    		->with('coupon', $coupon)
    		->with('distribuidor', $distribuidor);
    }

	public function get_tab($id)
	{
		$this->data['user'] = Auth::user(); 

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
		return View::make('home.tab'.$id, $this->data)
			->with('title','Paso '.$id.' Creacion de armario. Semiems')
			->with('id',$id)
			->with('id_wardrobe', $id_wardrobe)
			->with('wardrobes', $wardrobes);

	}

}