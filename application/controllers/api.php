<?php

class Api_Controller extends Base_Controller {

	public $restful = true;

	public function get_budget($id){
		
		$budget = Budget::find($id);

		if(isset($budget)){
			return Response::eloquent($budget);
		} else return Response::error('500');
	}
	public function post_budget(){
		$budget = new Budget;
		$budget->save();
		
		$object = Input::get('wardrobe');

		$wardrobe = new Wardrobe($object['data']);
		$budget->wardrobe()->insert($wardrobe);

		
	}
	public function get_wardrobe($id){
		$budget = Budget::find($id);
		$wardrobe = $budget->wardrobe()->first();
		return Response::eloquent($wardrobe);

		
	}

	public function put_wardrobe($id){
		$budget = Budget::find($id);
		$budget->wardrobe()->update(Input::get('wardrobe')['data']);
	}


}