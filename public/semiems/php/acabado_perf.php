<?php 
include '../php/connectDB.php';
$link2=get_db_conn();
$id=$_POST["id"];

//$anchura=$_POST["anchura_sel"];

//$SQL = "SELECT * FROM b_doors WHERE width_max >= '$anchura'";

$SQL = "SELECT * FROM b_handles WHERE id=".$id;
$result = mysql_query($SQL,$link2) or die("ERROR :".mysql_error());
if(mysql_num_rows($result)) {
    while($e = mysql_fetch_assoc($result)) {
    	$marco = array(
                        'id' => $e['id'],
                        'type' => $e['Tiradores'],
                        'cod' => $e['Codigo'],
                        'mat' => $e['Material'],
                        'dim' => $e['Largura'],
                        'desc' => $e['Desc'],
                        'img' => $e['img']
        				); 
        }
};

$source="contenido/Bibliotecas/tiradores";

$b="";
$b.="A seleccionado el tirador ".$marco['cod']."(".$marco['desc'].") Tamaño:".$marco['dim']." <img src=".$source."/".$marco['img']." />";

echo $b;
?>  
