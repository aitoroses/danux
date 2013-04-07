<?php

class Asides_Controller extends Base_Controller {

	public $restful = true;

	// BUDGET
	public function get_aside($name){
		switch ($name) {
    		case "getAccInt":
        		$id_wardrobe = Session::get('wardrobe_id');
        		$wardrobe = Wardrobe::find($id_wardrobe);
        		$modules = $wardrobe->modules()->get();
    			// Obtenemos los identificadores
    			$accesory_groups = array_map(function($module){
    				return $accints= $module->accints()->get();
    			}, $modules);
    			return View::make('asides.accesorios_interior')->with('accint', $accesory_groups);
            	break;
        	case "getPerfil":
            	$id_wardrobe = Session::get('wardrobe_id');
            	$wardrobe = Wardrobe::find($id_wardrobe);
            	$wardrobe_array=$wardrobe->to_array();

            	if ($wardrobe_array["tperfil"]!="0"){
            		$perfil_bd = DB::table('b_perfiles')->find($wardrobe_array["tperfil"]);
            		$result["tperfil"]=$wardrobe_array["tperfil"];
            		$result["name"]=$perfil_bd->name;
            	}else{
            		$result["tperfil"]=0;
            	}
            	return View::make('asides.perfil')->with('perfil',$result);
            	break;
            case "getTirador":
                $id_wardrobe = Session::get('wardrobe_id');
                $wardrobe = Wardrobe::find($id_wardrobe);
                $wardrobe_array=$wardrobe->to_array();

                if ($wardrobe_array["handle"]!="0"){
                    $tirador_bd = DB::table('b_handles')->find($wardrobe_array["handle"]);
                    $result["handle"]=$wardrobe_array["handle"];
                    $result["name"]=$tirador_bd->codigo." en ".$tirador_bd->material;
                }else{
                    $result["handle"]=0;
                }
                return View::make('asides.tirador')->with('tirador',$result);
                break;
            case "getMarco":
                $id_wardrobe = Session::get('wardrobe_id');
                $wardrobe = Wardrobe::find($id_wardrobe);
                $wardrobe_array=$wardrobe->to_array();

                if ($wardrobe_array["marco"]!="0"){
                    $data = DB::table('b_mat_puertas')->find($wardrobe_array["marco"]);
                    switch ($data->type) {
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
                    $result["marco"]=$wardrobe_array["marco"];
                    $result["data"]=$data;
                    $result["folder"]=$folder;
                }else{
                    $result["marco"]=0;
                }
                return View::make('asides.marco')->with('marco',$result);
                break;
        	default:
                return "No hay ruta aside";
        	   break;
    	}
	}
}