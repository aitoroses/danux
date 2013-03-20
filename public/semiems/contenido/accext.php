
<?php 
include '../php/connectDB.php';
$link2=get_db_conn();
$next=$_POST["nextin"];
$a="";
$SQL = "SELECT * FROM b_acc WHERE type=1";
$result = mysql_query($SQL,$link2) or die("ERROR :".mysql_error());
$a.= "<option value = 0>Seleccione un accesorio...</option>";
if(mysql_num_rows($result)) {
    while($e = mysql_fetch_assoc($result)) {

$a.= "<option value = ".$e['id'].">".$e['desc']."</option>"; 
        }
};


echo "<select id='accext_sel' name='Accesorios2'>".$a."</select> ";


?>