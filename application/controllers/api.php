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
			$obj->accints->delete();
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
		return Response::json($json);
	}
	public function put_json($id){
		$wardrobe = Wardrobe::find($id);
		$wardrobe->rebuild_from_client(Input::get('wardrobe'));
	}
		/*// UPDATE DATA
		Wardrobe::update($id, Input::get('wardrobe')["data"]);
		// UPDATE MODULES
		foreach (Input::get('wardrobe')["modules"] as $module) {
			// Save the parent module
			$parent_module = $wardrobe->save_module_and_accesories($module);
			// The module is returned, now we save special configuration
			if(isset($module["configuration"]["type"])){
				// Special configuration
				if(isset($module["configuration"]["type"]["relationships"])){
					$child_modules = $module["configuration"]["type"]["relationships"];
					if(sizeof($child_modules > 0)) {
						$parent_module->save_childs($child_modules, $wardrobe);
					}
				}
				
			} else {
				// Set parent
				$parent_module->set_childs(null);
			}

		}
		array_map(function($module){
			
		}, Input::get('wardrobe')["modules"]);
		// UPDATE DOORS
		array_map(function($door){
			if(isset($door["material"])){ 
				//si existen los materiales
				$materials = $door["material"];
				//extraemos el array
				unset($door["material"]); 
				//Actualizamos el modelo
				Door::update($door["id"], $door);
				//guardamos los materiales
				$door_model = Door::find($door["id"]);
				//por seguridad borro lo que hay sino hay problemas
				$door_model->materials()->delete();
				$door_model->materials()->sync($materials);
			}else{
				Door::update($door["id"], $door);
				//si no estan definidos los materiales los borro de la base de datos
				// esto soluciona el problema de que quites todos los materiales y guardes
				// asi todo OK
				$door_model = Door::find($door["id"]);
				$door_model->materials()->delete();
			}

		}, Input::get('wardrobe')["doors"]);

		// UPDATE ACCEXT
		if(isset(Input::get('wardrobe')["accext"])){ 
			//si existen los materiales
			$accs_ext = Input::get('wardrobe')["accext"];
			$wardrobe_model = Wardrobe::find($id);
			$wardrobe_model->accexts()->delete();
			$wardrobe_model->accexts()->sync($accs_ext);
		}else{
			$wardrobe_model = Wardrobe::find($id);
			$wardrobe_model->accexts()->delete();
		}
	}*/

}