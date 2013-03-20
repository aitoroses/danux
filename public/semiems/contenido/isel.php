
<div class="content-popup">
         <div class="close">
            <a href="#" id="close2" onClick="Close_popup();"><img src="img/close.png"/></a>
            <a href="#" onClick="pop_up('modules')"><img src="img/back.png"/></a>
        </div>  
        <p id="title_popup">Tipos de interior</p>
  <div id="sel_interiores">
		<ul>
<?php 
include '../php/connectDB.php';
$link2=get_db_conn();
$anchura=$_POST["anchura_sel"];

$SQL = "SELECT * FROM b_modules WHERE width_max >= '$anchura'";
$result = mysql_query($SQL,$link2) or die("ERROR :".mysql_error());
if(mysql_num_rows($result)) {
    while($e = mysql_fetch_assoc($result)) {
    	$modules[] = array(
        				'ref' => $e['id'],
        				'points' => $e['points'],
        				'image' => $e['image']
        				); 
        }
};


foreach($modules as $v){  
	echo "<li><a href='#'><div class='item'><img src=".$v['image']."/".$v['ref'].".png ref=".$v['ref']." /> <div class='title'>Ref.".$v['ref']."</div></div></a></li>";
 }
?>  

		
		</ul>
 </div>          
</div> 
