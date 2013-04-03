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
            case "accesorios_modulo":
                return View::make('popup.accesorios_modulo');
                break;
            case "agregar_accesorios_interior":
                // Query de accesorios
                $accs = DB::table('b_acc')->get();
                $list = array_map(function($acc){
                    return "<li><a class='selectormat' href='#'><div class='accint mat'><img src=semiems/contenido/Bibliotecas/AccInt/Loija/".$acc->img." desc=".$acc->desc." ref=".$acc->id." /> <div class='title'>Ref.".$acc->ref."(".$acc->desc.")</div></div></a></li>";
                }, $accs);
                return View::make('popup.agregar_accesorios_interior')->with('list', $list);
                break;
        	default:
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
