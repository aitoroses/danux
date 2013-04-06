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
                $list = array_map(function($module){
                    return "<li><a href='#'><div class='item'><img src=semiems/".$module->image."/".$module->id.".png ref=".$module->id." /> <div class='title'>Ref.".$module->id."</div></div></a></li>";
                }, $modules);
        		return View::make('popup.seleccion_interior')->with('list', $list);
            case "divisioninterior":
                return View::make('popup.divisioninterior');
                break;
            /*case "accesorios_modulo":
                return View::make('popup.accesorios_modulo');
                break;*/
            case "agregar_accesorios_interior":
                // Query de accesorios
                $accs = DB::table('b_acc')->get();
                $list = array_map(function($acc){
                    return "<li><a class='selectormat' href='#'><div class='accint mat'><img src=semiems/contenido/Bibliotecas/AccInt/Loija/".$acc->img." desc=".$acc->desc." ref=".$acc->id." /> <div class='title'>Ref.".$acc->ref."(".$acc->desc.")</div></div></a></li>";
                }, $accs);
                return View::make('popup.agregar_accesorios_interior')->with('list', $list);
                break;
            case "handle":
                // Query de accesorios
                $handles = DB::table('b_handles')->get();
                return View::make('popup.cambiar_tirador')->with('handles', $handles);
                break;
            case "perfil":
                // Query de accesorios
                $id_wardrobe = Session::get('wardrobe_id');
                $wardrobe = Wardrobe::find($id_wardrobe);
                $result = $wardrobe->typedoor;
                return View::make('popup.cambiar_perfil')->with('perfil', $result);
                break;
            case "materialesPuerta":
                // Query de accesorios
                $id_wardrobe = Session::get('wardrobe_id');
                $wardrobe = Wardrobe::find($id_wardrobe);
                if($wardrobe->typedoor=="1"&&$wardrobe->tperfil==3){
                    $result["all"] = 1;
                }else{
                    $result["all"] = 0;
                }
                return View::make('popup.materiales_puerta')->with('material', $result);
                break;
            default:

        		break;
    	}
	}
    public function get_materialsView(){
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
