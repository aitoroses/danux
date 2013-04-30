<?php
Class Content_Controller extends Base_Controller{
	
	public $restful = true;
	//Retorna el Campo desc de la puerta seleccionada de la BD,
	// este campo contiene las medidas de cada tipo de puerta en 
	// forma fraccionaria 
	public function get_door(){
		$id_wardrobe = Session::get('wardrobe_id');
		$wardrobe = Wardrobe::find($id_wardrobe);
		$doors = $wardrobe->doors()->get();
		
		$types = array_map(function($door){
			$type=$door->type;

			$door = DB::table('l_biblioteca_puertas')->find($type);
			$array_desc=explode(",",$door->desc);
			//Conversion del typoe del puerta al valor proporcional
			foreach ($array_desc as &$valor) {
			    $b=explode("/",$valor);
			    if (sizeof($b)==2){
			    	$zz=($b[0])/($b[1]);
			    	}else{
			    	$zz=1/($b[0]);
			    	}
			    $z[]=$zz;
			}

			return $z;
		}, $doors);

		//var_dump($types);
		$request["types"] =$types;

		$materials = array_map(function($door){
			$materials = $door->materials()->get();
			$src_materials = array_map(function($material){
				//$material = DB::table('l_biblioteca_materiales')->find($material_id);
				switch ($material->type) {
				    case 1:
				        $folder="Cristales_porcelanicos";
				        break;
				    case 2:
				        $folder="Gama_Imaprint";
				        break;
				    case 3:
				        $folder="Gama_Duo";
				        break;
				    case 4:
				        $folder="Gama_Luxe";
				        break;
				    case 5:
				        $folder="Maderas_Lacas";
				        break;
				}
				return "semiems/contenido/Bibliotecas/mat_puertas/".$folder."/".$material->image;	
			}, $materials);
			$z[]=$src_materials;
			return $z;
		}, $doors);
		$request["materials"] =$materials;
		//var_dump($materials);
		
		// sacamos el campo desc y lo convertimos a array
		
		// ahora convertimos las fracciones en sus valores
		
		//cuando hemos acabado convertimos el array en JSON para devolverlo
		$z_json= json_encode($request);
		return $z_json;
	}
	public function get_materialsource($id){
		$material = DB::table('l_biblioteca_materiales')->find($id);

		switch ($material->type) {
		    case 1:
		        $folder="Cristales_porcelanicos";
		        break;
		    case 2:
		        $folder="Gama_Imaprint";
		        break;
		    case 3:
		        $folder="Gama_Duo";
		        break;
		    case 4:
		        $folder="Gama_Luxe";
		        break;
		    case 5:
		        $folder="Maderas_Lacas";
		        break;
		}
		return "semiems/contenido/Bibliotecas/mat_puertas/".$folder."/".$material->image;
	}
}