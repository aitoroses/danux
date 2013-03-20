<?php
include 'connectDB.php';

$json = $_POST["rated"]; 
$id_arm = $_POST["id"];

$link=get_db_conn();

if ($id_arm==0){
	$id_arm=NULL;	
}else{
	$SQL = "DELETE FROM json WHERE id='".$id_arm."'";
	$result = mysql_query($SQL,$link)or die("ERROR :".mysql_error());
	
}

$SQL2 = "INSERT INTO json (`id`,`json`) VALUES ('".$id_arm."','".$json."')";
$result = mysql_query($SQL2,$link)or die("ERROR :".mysql_error());

$nid=mysql_insert_id();


if ($id_arm==NULL){
	
	$json =json_decode($json,true);
	$json[data][id]=$nid;
	$json =json_encode($json,true);
	
	$SQL = "DELETE FROM json WHERE id='".$nid."'";
	$result = mysql_query($SQL,$link)or die("ERROR :".mysql_error());
	
	$SQL2 = "INSERT INTO json (`id`,`json`) VALUES ('".$nid."','".$json."')";
	$result = mysql_query($SQL2,$link)or die("ERROR :".mysql_error());		
	
}
echo $nid;
?>