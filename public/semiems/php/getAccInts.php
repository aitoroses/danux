<?php 
include '../php/connectDB.php';
$link2=get_db_conn();
$type_mat=$_POST["type"];

//$anchura=$_POST["anchura_sel"];

//$SQL = "SELECT * FROM b_doors WHERE width_max >= '$anchura'";

$SQL = "SELECT * FROM b_acc WHERE proveedor=".$type_mat;
$result = mysql_query($SQL,$link2) or die("ERROR :".mysql_error());
if(mysql_num_rows($result)) {
    while($e = mysql_fetch_assoc($result)) {
    	$modules[] = array(
        				'id' => $e['id'],
        				'ref' => $e['ref'],
        				'desc' => $e['desc'],
        				'image' => $e['img']
        				); 
        }
};

switch ($type_mat) {
    case 1:
        $folder="Loija";
        break;
}

$source="contenido/Bibliotecas/AccInt/".$folder;
$b="";
foreach($modules as $v){ 
$b.="<li><a class='selectormat' href='#'><div class='accint mat'><img src=".$source."/".$v['image']." desc=".$v['desc']." ref=".$v['id']." /> <div class='title'>Ref.".$v['ref']."(".$v['desc'].")</div></div></a></li>";
}
echo "<div id='mat_puerta'><ul>".$b."</ul></div>";

?>  
