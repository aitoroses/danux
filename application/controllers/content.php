<?php
Class Content_Controller extends Base_Controller{
	
	public $restful = true;
	//Retorna el Campo desc de la puerta seleccionada de la BD,
	// este campo contiene las medidas de cada tipo de puerta en 
	// forma fraccionaria 
	public function get_door($id){
		$door = DB::table('l_biblioteca_puertas')->find($id);
		// sacamos el campo desc y lo convertimos a array
		$array_desc=explode(",",$door->desc);
		// ahora convertimos las fracciones en sus valores
		foreach ($array_desc as &$valor) {
		    $b=explode("/",$valor);
		    if (sizeof($b)==2){
		    	$zz=($b[0])/($b[1]);
		    	}else{
		    	$zz=1/($b[0]);
		    	}
		    $z[]=$zz;
		}
		//cuando hemos acabado convertimos el array en JSON para devolverlo
		$z_json= json_encode($z);
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