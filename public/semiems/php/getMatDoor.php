<?php 
include '../php/connectDB.php';
$link2=get_db_conn();
$type_mat=$_POST["type"];

//$anchura=$_POST["anchura_sel"];

//$SQL = "SELECT * FROM b_doors WHERE width_max >= '$anchura'";

$SQL = "SELECT * FROM b_mat_puertas WHERE type=".$type_mat;
$result = mysql_query($SQL,$link2) or die("ERROR :".mysql_error());
if(mysql_num_rows($result)) {
    while($e = mysql_fetch_assoc($result)) {
    	$modules[] = array(
        				'id' => $e['id'],
        				'ref' => $e['ref'],
        				'desc' => $e['desc'],
        				'image' => $e['image']
        				); 
        }
};

switch ($type_mat) {
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

$source="contenido/Bibliotecas/mat_puertas/".$folder;
$b="";
foreach($modules as $v){ 
        if($_POST["case"]){
            $b.="<li><a class='selectormat' href='#'><div class='item4 mat'><img src=".$source."/".$v['image']." ref=".$v['id']." /> <div class='title'>Ref.".$v['ref']."(".$v['desc'].")</div></div></a></li>";
        }else{
            $b.="<li><a class='selectormat' href='#'><div class='item3 mat'><img src=".$source."/".$v['image']." ref=".$v['id']." /> <div class='title'>Ref.".$v['ref']."(".$v['desc'].")</div></div></a></li>";
        } 
	 }
 echo "<div id='mat_puerta'><ul>".$b."</ul></div>";
?>  
