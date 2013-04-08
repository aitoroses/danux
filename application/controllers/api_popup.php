<?php

Class Api_Popup_Controller extends Base_Controller {
	
	public $restful = true;

	public function get_popup($name){
		switch ($name) {
    		case "modules":
        		return View::make('popup.modulos_opciones')->with('double', Session::get('double'));
        		break;
    		case "seleccioninterior":
                // Query de modulos
                $modules = DB::table('b_modules')->get();
        		return View::make('popup.seleccion_interior')->with('modules', $modules);
            case "divisioninterior":
                return View::make('popup.divisioninterior');
                break;
            case "agregar_accesorios_interior":
                // Query de accesorios
                $accs = DB::table('b_acc')->get();
                return View::make('popup.agregar_accesorios_interior')->with('accs', $accs);
                break;
            case "handle":
                // Query del tirador
                $handles = DB::table('b_handles')->get();
                return View::make('popup.cambiar_tirador')->with('handles', $handles);
                break;
            case "perfil":
                // Query del perfil
                $id_wardrobe = Session::get('wardrobe_id');
                $wardrobe = Wardrobe::find($id_wardrobe);
                $result = $wardrobe->typedoor;
                return View::make('popup.cambiar_perfil')->with('perfil', $result);
                break;
            case "materialesPuerta":
                // Query de materiales de la puerta
                $id_wardrobe = Session::get('wardrobe_id');
                $wardrobe = Wardrobe::find($id_wardrobe);
                if($wardrobe->typedoor=="1"&&$wardrobe->tperfil==3){
                    $result["all"] = 1;
                }else{
                    $result["all"] = 0;
                }
                return View::make('popup.materiales_puerta')->with('material', $result);
                break;
            case "distribucionPuerta":
                // Query de distribucion de la puerta
                $doors = DB::table('b_doors')->get();
                return View::make('popup.distribucion_puerta')->with('doors', $doors);;
                break;
            case "marco":
                // Vista de la seleccion de los materiales del marco
                return View::make('popup.materiales_marco');
                break;
            default:

        		break;
    	}
	}
    public function get_view($name){
        switch ($name) {
            case "materialsView":
                $type = Input::get('type');
                // @param $type: integer = {1, 2, 3, 4, 5}
                $data = DB::table('b_mat_puertas')->where_type($type)->get();
                switch ($type) {
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


                return View::make('popup.views.materials')
                    ->with('folder', $folder)
                    ->with('data', $data);
                break;
            case "perfilesView":
                $type = Input::get('type');
                // @param $type: integer = {1, 2, 3, 4, 5}
                $data = DB::table('b_perfiles_acabados')->where_tipo_perfil($type)->get();
                return View::make('popup.views.perfiles')
                    ->with('data', $data);
                break;
        }
    }
}



/*
$SQL = "SELECT * FROM b_modules WHERE width_max >= '$anchura'";
$result = mysql_query($SQL,$link2) or die("ERROR :".mysql_error());
if(mysql_num_rows($result)) {
    while($e = mysql_fetch_assoc($result)) {
        $modules[] = array(
                        'ref' => $e['id'],
                        'points' => $e['points'],
                        'image' => $e['image']
                        ); 
        }
};


foreach($modules as $v){  
    echo "<li><a href='#'><div class='item'><img src=".$v['image']."/".$v['ref'].".png ref=".$v['ref']." /> <div class='title'>Ref.".$v['ref']."</div></div></a></li>";
 }
 */
