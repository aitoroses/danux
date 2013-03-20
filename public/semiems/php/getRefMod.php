<?php
include 'connectDB.php';


$id = $_GET['id'];
$model = array();
$e="";

$link=get_db_conn();

$SQL = "SELECT image FROM b_modules WHERE id = '$id'";
$result = mysql_query($SQL,$link);
if(mysql_num_rows($result)) {
    while($e = mysql_fetch_assoc($result)) {
        				//$e.=$e."/".$id.".png";
        				echo $e['image']."/".$id.".png";
        }
};

?>