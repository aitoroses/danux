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
			$budget = new Budget;
			$budget->save();
			$wardrobe = new Wardrobe($object['data']);
			// Modules Object
			$budget->wardrobe()->insert($wardrobe);
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
	
	public function get_json($id){

		// OBTENER EL MODEL COMPLETO

		$wardrobe = Wardrobe::find($id);
		$modules = $wardrobe->modules()->get();
		$doors = $wardrobe->doors()->get();
		$accint = $wardrobe->accints()->get();
		$accext = $wardrobe->accexts()->get();
		// Arrays
		// modules
		$modules_array = array_map(function($object){
			return $object->to_array();
		}, $modules);
		
		$doors_array = array_map(function($object){
			// Obtenemos los materiales de cada puerta
			$materials = $object->materials()->get();
			// Obtenemos los identificadores
			$materials_ids = array_map(function($material){
				return $material->id;
			}, $materials);

			$result = $object->to_array();
			$result["material"] = $materials_ids;
			
			return $result;
		}, $doors);
		// Accesorios interiores y exteriores
		/*
		if(sizeof($accint) > 0){
			$accint = $accint->to_array();
		}
		if(sizeof($accext) > 0){
			$accext = $accext->to_array();
		}*/

		$json = array(
			'data' => $wardrobe->to_array(),
			'modules' => $modules_array,
			'doors' => $doors_array,
			'accint' => [],
			'accext' => [],


		);

		return Response::json($json);


	}

	// FLEXIGRID
	public function post_flexigrid(){

		// Defaults
		$page = 1; // The current page
		$sortname = 'id'; // Sort column
		$sortorder = 'asc'; // Sort order
		$qtype = ''; // Search column
		$query = ''; // Search string
		
		// Get posted data
		$page = Input::get('page');
		$sortname = Input::get('sortname');
		$sortorder = Input::get('sortorder');
		$qtype = Input::get('qtype');
		$query = Input::get('query');
		$rp = Input::get('rp');

		// Securing page is not null
		if (!$page) $page = 1;
		if (!$rp) $rp = 10;

		// Wardrobes models

		$wardrobes = Wardrobe::order_by($sortname, $sortorder)->take($rp)->skip(($page-1)*$rp)->get();
		$wardrobes_array = array_map(function($object){
			return $object->to_array();
		}, $wardrobes);

		$data['page'] = $page;
		$data['total'] = Wardrobe::count();
		foreach ($wardrobes as $object) {
		
			$data['rows'][] = array(
				'id' => $object->id,
				'cell' => array(
			        $object->id, 
					$object->name,
					$object->width."x".$object->height."x".$object->prof,
					$object->doors,
					$object->nmods, 
					$object->updated_at
		        )
	        );
		}
		
		return json_encode($data);
	}
	public function delete_flexigrid(){
		$items = json_decode(Input::get('items'));
		$total = count($items);

		// Delete those ID's
		$budgets = Budget::where_in('id', $items)->get();
		foreach ($budgets as $budget) {
			$budget->wardrobe()->delete();
			$budget->delete();
		}

		// Return

		$response = array(
			'items' => $items,
			'total'	=> $total
		);
		return Response::json($response);
		/*
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
		header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT" );
		header("Cache-Control: no-cache, must-revalidate" );
		header("Pragma: no-cache" );
		header("Content-type: text/x-json");
		$json = "";
		$json .= "{\n";
		$json .= "query: '".$sql."',\n";
		$json .= "total: '".$total."',\n";
		$json .= "}\n";
		return $json;*/
	}

}