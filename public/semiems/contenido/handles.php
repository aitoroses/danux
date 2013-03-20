<?
include '../php/connectDB.php';
$link2=get_db_conn();

$SQL = "SELECT * FROM b_handles";
$result = mysql_query($SQL,$link2) or die("ERROR :".mysql_error());
if(mysql_num_rows($result)) {
    while($e = mysql_fetch_assoc($result)) {
        $modules[] = array(
                        'id' => $e['id'],
                        'type' => $e['Tiradores'],
                        'cod' => $e['Codigo'],
                        'mat' => $e['Material'],
                        'dim' => $e['Largura'],
                        'desc' => $e['Desc'],
                        'img' => $e['img']
                        ); 
        }
};  

$source="contenido/Bibliotecas/tiradores";
$b="";
foreach($modules as $v){ 
$b.="<li>
<a class='selectormat' href='#'><div class='item5 mat'><img src=".$source."/".$v['img']." ref=".$v['id']." /> <div class='title'>".$v['type']." / Ref.".$v['cod']."(".$v['desc'].") Tamaño: ".$v['dim']."mm </div></div></a></li>";
     }
 


?>


    <div class="content-popup">
    <div class="close"><a href="#" id="close2" onClick="Close_popup();"><img src="img/close.png"/></a></div>
    <p id="title_popup">Seleccione el tirador</p>
    <? echo "<div id='handles'><ul>".$b."</ul></div>"; ?>
    </div>