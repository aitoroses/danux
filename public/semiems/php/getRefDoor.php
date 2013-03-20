<?php
include 'connectDB.php';


$id = $_GET['id'];
$e="";

$link=get_db_conn();

$SQL = "SELECT * FROM b_doors WHERE id = '$id'";
$result = mysql_query($SQL,$link);
if(mysql_num_rows($result)) {
    while($e = mysql_fetch_assoc($result)) {
        				//$e.=$e."/".$id.".png";
        				$a=explode(",",$e['desc']);
        }
};
$z="";

foreach ($a as &$valor) {
    $b=explode("/",$valor);
    if (sizeof($b)==2){
    	$zz=($b[0])/($b[1]);
    	}else{
    	$zz=1/($b[0]);
    	}
    $z[]=$zz;
}

echo json_encode($z);
?>