<?php 
include '../php/connectDB.php';
$link2=get_db_conn();
$id=$_POST["id"];

//$anchura=$_POST["anchura_sel"];

//$SQL = "SELECT * FROM b_doors WHERE width_max >= '$anchura'";

$SQL = "SELECT * FROM b_perfiles WHERE cat_id=".$id;
$result = mysql_query($SQL,$link2) or die("ERROR :".mysql_error());
if(mysql_num_rows($result)) {
    while($e = mysql_fetch_assoc($result)) {
    	$perfil = array(
        				'id' => $e['cat_id'],
        				'name' => $e['name'],
                        'parent' => $e['parent'],
        				'media' => $e['media'],
        				'tpuerta' => $e['tpuerta']
        				); 
        }
};

$SQL = "SELECT * FROM b_perfiles WHERE cat_id=".$perfil['parent'];
$result = mysql_query($SQL,$link2) or die("ERROR :".mysql_error());
if(mysql_num_rows($result)) {
    while($e = mysql_fetch_assoc($result)) {
        $perfilp = array(
                        'id' => $e['cat_id'],
                        'name' => $e['name'],
                        'parent' => $e['parent'],
                        'media' => $e['media'],
                        'tpuerta' => $e['tpuerta']
                        ); 
        }
};


$source="contenido/Bibliotecas/perfiles";
$b="";
$b.="A seleccionado el perfil ".$perfilp['name']."/".$perfil['name']." <img src=".$source."/".$perfil['media']." />";

echo $b;
?>  
