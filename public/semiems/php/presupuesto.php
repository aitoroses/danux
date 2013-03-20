<?php
include '../php/connectDB.php';
$jsonr = $_POST["rated"];
$json =json_decode($jsonr,true);

$salida="";
/*
$salida.="<li> Dimensiones del Armario:".$json[data][width]."x".$json[data][height]."x".$json[data][prof]."</li>";
$salida.="<li> Numero de modulos:".$json[data][nmods]."<ul>";
$x=1;

foreach($json[modules] as $mod){
	
	if ($mod[double]==0){
		$modulond=" Modulo simple, de tipo: ".$mod[ref1];
	}else{
		$modulond=" Modulo doble, de tipo: ".$mod[ref1]." y ".$mod[ref2]." division colocada a ".$mod[ddouble]." mm de la izquierda";
	}
	
	$salida.="<li> Dimensiones de modulo ".$x.":".$mod[width]."x".$mod[height]."x".$json[data][prof]." ".$modulond."</li>";
	$x++;
}
$salida.="</ul></li>";
$salida.="<li> Numero de puertas:".$json[data][doors]."</li>";
$x=1;
foreach($json[doors] as $mod){
	
	$salida.="<li> Tipo de puerta ".$x.":".$mod[type]." Material:".$mod[material]."</li>";
	$x++;
}

$salida.="----------------------PRECIOS------------------------------";
*/
$link=get_db_conn();
$costados=intval($json[data][nmods])-1;

	$SQL = "SELECT precio FROM b_piezas_int WHERE tipo=5";
	$result = mysql_query($SQL,$link) or die("ERROR :".mysql_error());
	if(mysql_num_rows($result)) {
    	while($e = mysql_fetch_assoc($result)) {
						$pcint=$e[precio];
	};
};	
	$SQL = "SELECT precio FROM b_piezas_int WHERE tipo=6";
	$result = mysql_query($SQL,$link) or die("ERROR :".mysql_error());
	if(mysql_num_rows($result)) {
    	while($e = mysql_fetch_assoc($result)) {
						$pcext=$e[precio];
	};
};
$ptint=$costados*$pcint;
$pext=$pcext*2;
$pctt=$pext+$ptint;

$salida.="<table id='hor-minimalist-b' summary='Presupuesto'>";
$salida.="<thead>";
$salida.="<tr>";
$salida.="<th scope='col'>Pieza</th>";
$salida.="<th scope='col'>Unidades</th>";
$salida.="<th scope='col'>Precio unidad</th>";
$salida.="<th scope='col'>Subtotal</th>";
$salida.="<th scope='col'>Total</th>";
$salida.="</tr>";
$salida.="</thead>";
$salida.="<tbody>";


$salida.="<tr> <td>Costado interior</td><td>".$costados."</td><td>".$pcint."</td><td>".$ptint."</td><td> </td></tr>";
$salida.="<tr> <td>Costado exterior</td><td>2</td><td>".$pcext."</td><td>".$pext."</td><td> </td></tr>";
$salida.="<tr> <td>Total costados:<td><td> </td><td> </td><td>".$pctt."</td><tr>";

$x=1;
$pmtt=0;
foreach($json[modules] as $mod){
	
	$SQL = "SELECT precio FROM b_piezas_int WHERE tipo=1 AND ancho>='".$mod[width]."' ORDER BY ancho ASC LIMIT 0,1";
	$result = mysql_query($SQL,$link) or die("ERROR :".mysql_error());
	if(mysql_num_rows($result)) {
    	while($e = mysql_fetch_assoc($result)) {
						$ptras=$e[precio];
	};
};

	$SQL = "SELECT precio FROM b_piezas_int WHERE tipo=2 AND ancho>='".$mod[width]."' ORDER BY ancho ASC LIMIT 0,1";
	$result = mysql_query($SQL,$link) or die("ERROR :".mysql_error());
	if(mysql_num_rows($result)) {
    	while($e = mysql_fetch_assoc($result)) {
						$pbase=$e[precio];
	};
};
	$SQL = "SELECT precio FROM b_piezas_int WHERE tipo=3 AND ancho>='".$mod[width]."' ORDER BY ancho ASC LIMIT 0,1";
	$result = mysql_query($SQL,$link) or die("ERROR :".mysql_error());
	if(mysql_num_rows($result)) {
    	while($e = mysql_fetch_assoc($result)) {
						$ptecho=$e[precio];
	};
};
$pmt=$ptras+$pbase+$ptecho;
$pmtt=$pmtt+$pmt;
	
	$salida.="<tr> <td>Trasera</td><td>1</td><td>".$ptras."</td><td>".$ptras."</td><td> </td></tr>";
	$salida.="<tr> <td>Base</td><td>1</td><td>".$pbase."</td><td>".$pbase."</td><td> </td></tr>";
	$salida.="<tr> <td>Techo</td><td>1</td><td>".$ptecho."</td><td>".$ptecho."</td><td> </td></tr>";
	$salida.="<tr> <td>Total modulo ".$x."</td><td> </td><td> </td><td> </td><td>".$pmt."</td></tr>";
	$x++;

}
$armazon_tot=$pmtt+$ptint+$pext;
	$salida.="<tr> <td>Total Armazon</td><td> </td><td> </td><td> </td><td>".$armazon_tot."</td></tr>";
$salida.="</tbody>";
$salida.="</table>";
echo $salida;

?>










