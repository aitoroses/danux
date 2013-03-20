<?php
include 'connectDB.php';


$id = $_POST['id'];


$link=get_db_conn();

$SQL = "SELECT * FROM json WHERE id = '$id'";
$result = mysql_query($SQL,$link);
if(mysql_num_rows($result)) {
    while($e = mysql_fetch_assoc($result)) {
        				$json = $e['json'];
        }
};

echo $json;
?>