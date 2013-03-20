
<div class="content-popup">
  <div class="close"><a href="#" onClick="Close_popup()"><img src="img/close.png"/></a></div>
  <p id="title_popup">Seleccione tipo de puerta</p>
  <div id="sel_interiores">
		<ul>
<?php 
include '../php/connectDB.php';
$link2=get_db_conn();
//$anchura=$_POST["anchura_sel"];

//$SQL = "SELECT * FROM b_doors WHERE width_max >= '$anchura'";

$SQL = "SELECT * FROM b_doors ";
$result = mysql_query($SQL,$link2) or die("ERROR :".mysql_error());
if(mysql_num_rows($result)) {
    while($e = mysql_fetch_assoc($result)) {
    	$modules[] = array(
        				'ref' => $e['id'],
        				'image' => $e['image'],
        				'div' => $e['div']
        				); 
        }
};


foreach($modules as $v){  
	echo "<li><a href='#'><div class='item2'><img src=".$v['image']."/".$v['ref'].".png ref=".$v['ref']." div=".$v['div']." /> <div class='title'>Ref.".$v['ref']."</div></div></a></li>";
 }
?>  

		
		</ul>
 </div>          
</div> 
