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
                    $acabado_perfil =DB::table('b_perfiles_acabados')->find($wardrobe_array["perfil"]);
            		$result["tperfil"]=$wardrobe_array["tperfil"];
            		$result["name"]=$perfil_bd->name;
                    if ($acabado_perfil!=NULL){
                        $result["acabado"] = $acabado_perfil->name;
                    }else{
                        $result["acabado"] = NULL;
                    }
            	}else{
            		$result["tperfil"]=0;
                    $result["acabado"] = 0;
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
            case "getAccExt":
                $id_wardrobe = Session::get('wardrobe_id');
                $wardrobe = Wardrobe::find($id_wardrobe);
                $accexts= $wardrobe->accexts()->get();
                return View::make('asides.accesorios_exterior')->with('accext', $accexts);
                break;
            case "getPresupuesto":
                $id_wardrobe = Session::get('wardrobe_id');
                $wardrobe = Wardrobe::find($id_wardrobe);
                $modules = $wardrobe->modules()->get();
                //Costados del armario
                $data["costadoInterior"] = DB::table('b_piezas_int')->where_tipo(5)->first();
                $data["costadoExterior"] = DB::table('b_piezas_int')->where_tipo(6)->first();
                //traseras,techo,base
                
                $data["module"] = array();

                foreach ($modules as $mod) {
                    $modulo_array["trasera"] = array();
                    $modulo_array["base"] = array();
                    $modulo_array["techo"] = array();

                    $trasera = DB::table('b_piezas_int')->where_tipo(1)
                                                                    ->where('ancho', '>=', $mod->width)
                                                                    ->order_by('ancho','asc')
                                                                    ->first();
                    $base = DB::table('b_piezas_int')->where_tipo(2)
                                                                ->where('ancho', '>=', $mod->width)
                                                                ->order_by('ancho','asc')
                                                                ->first();
                    $techo = DB::table('b_piezas_int')->where_tipo(3)
                                                                ->where('ancho', '>=', $mod->width)
                                                                ->order_by('ancho','asc')
                                                                ->first();
 
                    $modulo_array["trasera"] = (array) $trasera;
                    $modulo_array["base"] = (array) $base;
                    $modulo_array["techo"] = (array) $techo;

                    array_push($data["module"], $modulo_array);

                }

                //return var_dump($data["module"]);

                return View::make('asides.presupuesto')->with('wardrobe',$data);
                //return View::make('asides.presupuesto');
                break;
    	}
	}
}