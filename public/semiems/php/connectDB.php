<?php
/*
//datos de conexion que hay que editar con los que corresponda
$dbip = 'localhost';
$dbuser = 'root';
$dbpass = 'root';
$dbsel = 'semiems';

$G['DB_IP'] = 'db447227416.db.1and1.com';
$G['DB_USER'] = 'dbo447227416';
$G['DB_PASS'] = '583r196';
$G['DB_NAME'] = 'db447227416';
*/
//
// Funcion que vamos a usar para realizar la conexion (Acá no se edita nada)
//
function get_db_conn() {
if (!$link) {
$link=mysql_connect(localhost, root, root);
//$link=mysql_connect('db447227416.db.1and1.com', 'dbo447227416', '583r196');

}

mysql_select_db(semiems, $link);
//mysql_select_db('db447227416', $link);

if (!$link) {
echo "Fallo config.php: " . mysql_error();
exit;
}
 
return $link;
}

?>