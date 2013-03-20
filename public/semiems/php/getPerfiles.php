<?php

include('connectDB.php');

$tperfil =$_POST["type_perfil"];

// 1 batientes 0 correderas
$return='';
$link=get_db_conn();
$ssql = mysql_query("select cat_id,name,media from b_perfiles where parent='$tperfil'",$link);
$return.="<ul>";
	    while ($srow = mysql_fetch_array($ssql)) {

$return.="<li class='item6' ><a href='#' ref='".$srow['cat_id']."'><div><img src=contenido/Bibliotecas/perfiles/".$srow['media']." /> <div class='title'>".$srow['name']."</div></div></a></li>";

	    }

	    // pushing sinlge category into parent
$return.="</ul>";
echo $return;
?>