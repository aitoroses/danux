<?php 
include '../php/connectDB.php';
$link2=get_db_conn();
$id=$_GET["id"];

//$anchura=$_POST["anchura_sel"];

//$SQL = "SELECT * FROM b_doors WHERE width_max >= '$anchura'";

$SQL = "SELECT * FROM b_acc WHERE id=".$id;

$result = mysql_query($SQL,$link2) or die("ERROR :".mysql_error());
if(mysql_num_rows($result)) {
    while($e = mysql_fetch_assoc($result)) {
    	$acc = array(
        				'id' => $e['id'],
        				'ref' => $e['ref'],
        				'desc' => $e['desc'],
        				'img' => $e['img']
        				); 
        }
};

$source="contenido/Bibliotecas/AccInt/Loija";

$b="<div id='rut".$acc['id']."' class='li_acc'><div class='mat'><img class='img_acc' src=".$source."/".$acc['img']." /> <div class='title'>Ref.".$acc['ref']."(".$acc['desc'].")</div></div><a class='minus_acc' href='#' onClick='delRow(".$acc['id'].")'> <img  src='img/minus.png'/> </a></div>";
echo $b;

?>  
