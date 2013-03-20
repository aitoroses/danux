<?php 
include '../php/connectDB.php';
$link2=get_db_conn();
$ref_mat =$_POST["id"];
//$anchura=$_POST["anchura_sel"];

//$SQL = "SELECT * FROM b_doors WHERE width_max >= '$anchura'";

$SQL = "SELECT * FROM b_mat_puertas WHERE id=".$ref_mat;
$result = mysql_query($SQL,$link2) or die("ERROR :".mysql_error());
if(mysql_num_rows($result)) {
    while($e = mysql_fetch_assoc($result)) {
   	$module = array(
        				'id' => $e['id'],
        				'type' => $e['type'],
        				'ref' => $e['ref'],
        				'desc' => $e['desc'],
        				'image' => $e['image']
        				); 
  
        }
};

switch ($module['type']) {
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
echo $source."/".$module['image']; 
