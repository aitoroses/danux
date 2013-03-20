<? 
$items = rtrim($_POST['items'],",");
include '../../php/connectDB.php';
$linkk=get_db_conn();


$sql = "DELETE FROM `json` WHERE `id` IN ($items)";

$total = count(explode(",",$items)); 

$result = mysql_query($sql) or die ('test'); 
mysql_close($linkk);
$total = mysql_affected_rows();
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT" );
header("Cache-Control: no-cache, must-revalidate" );
header("Pragma: no-cache" );
header("Content-type: text/x-json");
$json = "";
$json .= "{\n";
$json .= "query: '".$sql."',\n";
$json .= "total: '".$total."',\n";
$json .= "}\n";
echo $json;
 ?>