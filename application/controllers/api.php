<?php

class Api_Controller extends Base_Controller {

	public $restful = true;

	// BUDGET
	public function get_budget($id){
		
		$budget = Budget::find($id);

		if(isset($budget)){
			return Response::eloquent($budget);
		} else return Response::error('500');
	}
	public function post_budget(){
		
		$object = Input::get('wardrobe');

		$validation = Wardrobe::validate($object['data']);
		if($validation->fails()){
			return View::make('home.errors')
				->with('errors', $validation->errors);

		} else {
			$user = Auth::user();
			$budget = $user->budgets()->first();
			if($budget == null){
				$budget = new Budget();
				$user->budgets()->insert($budget);
			}
			
			$wardrobe = new Wardrobe($object['data']);

			$budget->wardrobe()->insert($wardrobe);

			// Save ID in session
			Session::put('wardrobe_id', $wardrobe->id);

			// Modules Object
			if(isset($object["modules"]))
			{
				$modules_array = $object['modules'];
				$module_objects = [];
				foreach ($modules_array as $module_array) {
					$model = new Module($module_array);
					$model->set_childs(array());
					$module_objects[]=$model;
				}
				
				foreach ($module_objects as $ele) {
					$wardrobe->modules()->insert($ele);
				}
			}
			// Doors object
			if(isset($object["modules"]))
			{
				$doors_array = $object['doors'];
				$doors_objects = array_map(function($doors_array){
					// Delete materials
					unset($doors_array["material"]);
					return $model = new Door($doors_array);
				}, $doors_array);
				foreach ($doors_objects as $ele) {
					$wardrobe->doors()->insert($ele);
				}
			}
			return "OK";
		}
	}

	// WARDROBE
	public function get_wardrobe($id){
		$budget = Budget::find($id);
		$wardrobe = $budget->wardrobe()->first();
		return Response::eloquent($wardrobe);	
	}
	public function put_wardrobe($id){
		$budget = Budget::find($id);
		$budget->wardrobe()->update(Input::get('wardrobe')['data']);
	}

	public function delete_wardrobe(){
		$id = Input::get('id');

		$wardrobe = Wardrobe::find($id)->first();

		$modules = $wardrobe->modules();
		$modules_models = $modules->get();
		foreach ($modules_models as $obj) {
			$childs_to_delete = $obj->get_childs();
			foreach ($childs_to_delete as $child) {
				$child->accints()->delete();
				$child->delete();
			}
			$obj->accints()->delete();
		}
		$modules->delete();

		$wardrobe->doors()->delete();
		
		$wardrobe->accexts()->delete();
		
		Wardrobe::find($id)->delete();

		Session::forget('wardrobe_id');

		return Redirect::to('/1#config');
	}
	
	public function get_json($id){

		// OBTENER EL MODEL COMPLETO
		$json = Wardrobe::rebuild_for_client($id);

		$response = Response::make(json_encode($json, JSON_NUMERIC_CHECK), 200);

		$response->header('Content-Type', 'application/json');

		return $response;
	}
	public function put_json($id){
		$wardrobe = Wardrobe::find($id);
		$wardrobe->rebuild_from_client(Input::get('wardrobe'));
	}
}