<?php
	
session_start();

if($_SESSION['SESS_MEMBER_ID'] == '') {
header("location: ../index.php");
exit();
}

?>



<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es-ES">
<head>
<title>Semiems imagina tu armario</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" media="screen" href="example.css" />
<link rel="stylesheet" type="text/css" href="stylep.css" />
<link rel="stylesheet" type="text/css" href="tables.css" />
<link rel="stylesheet" href="tabs.css" type="text/css" media="screen, projection"/>

<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/jquery-migrate-1.1.1.min.js"></script>
<!--
<script type="text/javascript" src="js/jquery.min.js"></script>
-->
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/kinetic-v4.3.2.min.js"></script>

<script src='js/underscore-min.js' type='text/javascript'></script>
<script src='js/backbone-min.js' type='text/javascript'></script>
<script src='js/application.js' type='text/javascript'></script>


<link rel="stylesheet" type="text/css" href="js/flexigrid/flexigrid.css" />
<script type="text/javascript" src="js/flexigrid/flexigrid.js"></script>

<script type="text/javascript" src="js/cond_inic.js"></script> 
<script type="text/javascript" src="js/modelo.js"></script> 
<script type="text/javascript" src="js/main.js"></script> 
<script type="text/javascript" src="js/pinta_arm.js"></script>  
<script type="text/javascript">


//Globales
var client = {
				  				"company":	"danibram",
								"nif" :	"44614506a"
			};

var wardrobe = 0;
var nuevo=1;
var puertas_aux="sel";
var modulos_aux="div";	
var pselect=0;

var moduleselect = 0;
var puertaselect = 0;

var materialselect=[];
var colortemp="";
var anchuratemp=0;

var	stage ="";
var	stagep ="";
var	layer = new Kinetic.Layer();
var	layeri = new Kinetic.Layer();
var	layerp = new Kinetic.Layer();
var	layerpi = new Kinetic.Layer();
var	layerm = new Kinetic.Layer();

var alto="";
var ancho="";
var anchoaltillo=0.13;

$(function() {
var $tabs = $('#tabs').tabs();	
$('#tabs').tabs({ event: '' }); //probably better
  $('#tabs').bind('tabsshow', function(event, ui) {
    window.location.hash = '#' + ui.panel.id;
  });
	$('.next-tab, .prev-tab').click(function() { 

		if($(this).attr("rel")==4 && document.frm.puerta.value == 2){
			$tabs.tabs('select', 5);
		}else if($(this).attr("rel")==5 && document.frm.puerta.value == 2){
			$tabs.tabs('select', 2);
		}else{
			$tabs.tabs('select', $(this).attr("rel"));
		}
		ini();
		return false;
	});


	var lvl = $('#sel_parent');						//selector for the tab menu
	lvl.find('a').live('click', function() {		
		$('a.selector').removeClass('onn')
		$(this).addClass('onn')
		return false;
	});	

	$(".item img").live("click", function() {
	
		var ref = $(this).attr('ref');
		var auxitem=moduleselect.substring(1,2)
		
		if (moduleselect.substring(3,4)==1){
			wardrobe.modules[auxitem].ref1=ref
		
		}else if (moduleselect.substring(3,4)==2){
			wardrobe.modules[auxitem].ref2=ref
			}
		pintamodulos();
		Close_popup();	
		
	});
		$(".item2 img").live("click", function() {
		

		var ref = $(this).attr('ref');
		var div = $(this).attr('div');
		$.each(materialselect, function(i, selection){

			var auxitem=selection.substring(1,2);
			wardrobe.doors[auxitem].type=ref;
			var strout_div=[];
			for (var iiii=0;iiii<div;iiii++)
			{ 
				strout_div.push(0);
			}
			wardrobe.doors[auxitem].material=strout_div;

		})
		materialselect=[];
		/*var ref = $(this).attr('ref');
		var auxitem=puertaselect.substring(1,2);
		wardrobe.doors[auxitem].type=ref;
		var div = $(this).attr('div');
		var strout_div=[];
		for (var iiii=0;iiii<div;iiii++)
		{ 
			strout_div.push(0);
		}
		wardrobe.doors[auxitem].material=strout_div;*/			
		pintapuertas();
		Close_popup();	
	});
		$(".item3 img").live("click", function() {
		
		var ref = $(this).attr('ref');
		$.each(materialselect, function(i, selection){

			var auxitem=selection.substring(1,2);
			var auxitem2=selection.substring(3,4);
			wardrobe.doors[auxitem].material[auxitem2]=ref;

		})
		materialselect=[];
		
		/*var ref = $(this).attr('ref');
		var auxitem=puertaselect.substring(1,2);
		var auxitem2=puertaselect.substring(3,4);
		wardrobe.doors[auxitem].material[auxitem2]=ref;*/
		
		pintapuertas();
		acabado_perfil();
		Close_popup();	
	});
		$(".item4 img").live("click", function() {		
		var ref = $(this).attr('ref');
		wardrobe.data.marco=parseInt(ref);
		$('#mat_marc').html(''); 
		pintapuertas();
		cambio_marco();
		Close_popup();	
	});
		$(".item5 img").live("click", function() {		
		var ref = $(this).attr('ref');
		wardrobe.data.handle=parseInt(ref);
		//$('#mat_marc').html(''); 
		//pintapuertas();
		cambio_tirador();
		Close_popup();	
	});
		$(".accint img").live("click", function() {		
		var ref = parseInt($(this).attr('ref'));

		var idx = wardrobe.accint.indexOf(ref); // Find the index
            if(idx!=-1) {
            }else{
              wardrobe.accint.push(ref);
            }
        AgregarAccInt();
		Close_popup();	
	});

});
</script>


</head>
<body>
<header class="cf">
<nav>
	<ul>
		<li style="padding: 5px;">Bienvenido <?echo $_SESSION['SESS_FIRST_NAME']; ?></li>
		<li><a href="../logout.php" class="logout">Cerrar session</a></li>
	</ul>
</nav>
</header>
<div id="page_screen"></div>

<div id="main">


<h1>Configura tu armario:</h1>


<div id="tabs">
		
    		<ul>
        		<li><a href="#paso-1">1. Configuración inicial</a></li>
        		<li><a href="#paso-2">2. Interior</a></li>
        		<li><a href="#paso-3">3. Accesorios Int</a></li>
        		<li><a href="#paso-4">4. Perfil</a></li>
        		<li><a href="#paso-5">5. Puertas</a></li>
        		<li><a href="#paso-6">6. Marco</a></li>
        		<li><a href="#paso-7">7. Accesorios Ext</a></li>
				<li><a href="#paso-8" onClick="generarpresupuesto()">8. Resumen Final</a></li>
				<li class="shadowtab"></li>
    	   </ul>





<div id="paso-1" class="ui-tabs-panel">
	<div>
	<div class="left">
	<h2>Crea un presupuesto</h2>
	<p>Introduce las medidas de tu hueco (mm):</p>
	<form id="frm" name="frm" action="php/guardadatos.php"> 
	<fieldset>
 	<p><label> Nombre del presupuesto: </label><input type="text" name="name" size="40"></p>
	<label> Alto: </label><input type="text" name="malto" size="6">
	<label> Ancho: </label><input type="text" name="mancho" size="6"  onchange="calculo_puertas(document.frm.npuertas)">
	<label> Profundidad: </label><input type="text" name="mprof" size="6">
<p></p>
	<p>Selecciona el tipo y numero de puertas que deseas:</p>
	<label> Tipo de puertas</label>
	<select name="puerta" onChange="calculo_puertas(document.frm.npuertas)"> 
	<option id="puerta" value = "3"> </option>
	<option id="puerta" value = "2">Armario sin puertas</option> 
	<option id="puerta" value = "1">Batientes</option> 
	<option id="puerta" value = "0">Correderas</option> 
	</select> 

	<label>Numero de puertas: </label>
	<select name="npuertas" onChange="puertas_impares_bat()">
	</select>
	<p></p>
	<div id="puertas_imp_bat"></div>
	</fieldset>
	</form>
 
  	<br/>
 	</div>
 	<div class="right">
 	<br/>
 	
 	<h2><a href='#' onClick="pop_up('flexigrid');"> O carga un presupuesto existente</a></h2>
		<!-- CARGA PRESUPUESTOS -->  

			<input type="radio" name="radio" class="radio" onClick="resetWardrobe()"> Nuevo a partir de armario </input>

 	</div>
 	<div id="result"></div>
 	</div>
 	<a href='#' class='next-tab mover' rel='2' >Siguiente &#187;</a> 
</div>


<div id="paso-2" class="ui-tabs-panel">
<h2>Configura los interiores</h2>

<div id="containeri"></div>

<a href='#' class='next-tab mover' rel='3'>Siguiente &#187;</a>
<a href='#' class='prev-tab mover' rel='1'>&#171; Atras</a>

</div>

<div id="paso-3" class="ui-tabs-panel">
<h2>Añade Accesorios de interior</h2>
<form id="forma" name="forma" method="post">
 <a href="#" onclick="pop_up('accint')">Agregar Accesorio</a>
 <ul>
 <div id="accint">
 </ul>
 
<script type="text/javascript">

var delRow = function (indice){
// Funcion que destruye el elemento actual una vez echo el click
$("#rut" + indice).remove ();

	var idx = wardrobe.accint.indexOf(indice); // Find the index
            if(idx!=-1) {
            	wardrobe.accint.splice(idx, 1);
            }
 }


</script>

<a href='#' class='next-tab mover' onclick='' rel='4'>Siguiente &#187;</a>
<a href='#' class='prev-tab mover' onclick='' rel='2'>&#171; Atras</a>

</div>


<div id="paso-4" class="ui-tabs-panel">
<script type="text/javascript">
function cargar_perfiles(){
	var type_perfil = parseInt(wardrobe.data.tperfil);

	if (type_perfil==0){
  		$('#perfil_sel').html("No has seleccionado perfil");   
  	}else if (type_perfil==1){
  		$('#perfil_sel').html("Has seleccionado perfil Minimalista");
  	}else if (type_perfil==2){
  		$('#perfil_sel').html("Has seleccionado perfil Clasico");
  	}else if (type_perfil==3){
  		$('#perfil_sel').html("Has seleccionado puerta sin perfil (Lisa)");
  	}else if (type_perfil==4){
  		$('#perfil_sel').html("Has seleccionado puerta con perfil");
  	}


}
function get_perfiles(type_perfil){

  	if (type_perfil==1){
  		wardrobe.data.tperfil=type_perfil;
  	}else if (type_perfil==2){
  		wardrobe.data.tperfil=type_perfil;
  	}else if (type_perfil==3){
  		wardrobe.data.tperfil=type_perfil;
  	}else if (type_perfil==4){
  		wardrobe.data.tperfil=type_perfil;
  	}
  	Close_popup();
  	acabado_perfil();
  	guardarJson();
}

function cambio_tirador(){

            if (parseInt(wardrobe.data.handle)!=0){

                $.ajax({
                    type: 'POST',  
                url: 'php/getHandle.php',
                data: {
                    "id" : parseInt(wardrobe.data.handle),
                    }, 
                success: function(data) {  
                    $('#handles_sel').html(data);  
                    }  
                })

            }else{
                $('#marco_sel').html("Por favor, seleccione un perfil.");     
            }
        }
</script>
<h2>Seleccione el tipo de Perfil:</h2>
<div id="perfiles">
<div id="perfil_sel">Por favor, seleccione un perfil.</div>

<a href='#' class='submit-button' onclick="pop_up('perfil')">Selecciona tipo de perfil</a>
</div>
<div id="perfiles2">
<div id="handles_sel">Por favor, selecciona un tipo de tirador.</div>
<a href='#' class='submit-button' onclick="pop_up('handle')">Selecciona tipo de tirador</a>
</div>
<a href='#' class='next-tab mover' rel='5'>Siguiente &#187;</a>
<a href='#' class='prev-tab mover' rel='3'>&#171; Atras</a>
</div>

<div id="paso-5" class="ui-tabs-panel">
<h2>Configura las puertas</h2>
<span>Seleccione las puertas o paneles y clicke a la derecha una de las dos opciones</span>
<div id="sel2">

<a class="submit-button" href="#" onClick="pop_up('psel');">Tipo de puertas</a>
<a class="submit-button" href="#" onClick="pop_up('pdiv');">Materiales</a> 


</div>


<div id="containerp"></div>

<a href='#' onClick="cambia_puerta('all')">Todas iguales</a>
<a href='#' onClick="cambia_puerta('par')">Pares iguales</a>
<a href='#' onClick="cambia_puerta('impar')">impares iguales</a>

<div id="acabado_perfil">No hay datos para saberlo. (Añada mas materiales)</div>


<a href='#' class='next-tab mover' rel='6'>Siguiente &#187;</a>
<a href='#' class='prev-tab mover' rel='4'>&#171; Atras</a>
</div>

<div id="paso-6" class="ui-tabs-panel">
	<h2>Seleccione acabado del marco/jamba</h2>
    <div id="sel_material2">
    <script type="text/javascript">
	//####################################### MARCO
	// Aux si es para tipo de material de puerta o de marco
    function mat_marc(type_material){
  	
    	$.ajax({
         		type: 'POST',  
              url: 'php/getMatDoor.php',
              data: {
      				"type" : type_material,
      				"case" : 1
    				}, 
              success: function(data) {  
                  $('#aux2').html(data);  
              }  
          })	
  
    }
    function cambio_marco(){

            if (parseInt(wardrobe.data.marco)!=0){

                $.ajax({
                    type: 'POST',  
                url: 'php/getMarco.php',
                data: {
                    "id" : parseInt(wardrobe.data.marco),
                    }, 
                success: function(data) {  
                    $('#marco_sel').html(data);  
                    }  
                })

            }else{
                $('#marco_sel').html("Por favor, seleccione un perfil.");     
            }
        }
     
    </script>
    <div id="marco_sel">Por favor, seleccione un perfil.</div>
    <a href="#" class='submit-button' onClick="pop_up('marco');">Tipo de puertas</a>
  
  
   </div>	
	
	
<a href='#' class='next-tab mover' rel='7'>Siguiente &#187;</a>
<a href='#' class='prev-tab mover' rel='5'>&#171; Atras</a>
</div>

<div id="paso-7" class="ui-tabs-panel">
<h2>Añade Accesorios de exterior</h2>
<form id="forma2" name="forma2" method="post">
 <a href="#" onclick="AgregarCampos2();">Agregar Accesorio</a>
 <ul>
 <div id="accext">
 </ul>
 
<script type="text/javascript">
var nextinput2 = 0;
function AgregarCampos2(){
nextinput2++;

var acc2 = $.ajax({
       		type: 'POST',  
            url: 'contenido/accext.php',
            async: false,
            data: {
    				"nextin2" : nextinput2
  				}, 
            success: function(data) { 

campo2 = '<li id="rut2'+nextinput2+'">'+data+'<a href="#" onChange="" onClick="delRow2(' + nextinput2 + ')"> Borrar Accesorio </a></li>';

            }  
        })	


$("#accext").append(campo2);

}

var delRow2 = function (indice2){
// Funcion que destruye el elemento actual una vez echo el click
$("#rut2" + indice2).remove();

 }

</script>
<a href='#' class='next-tab mover' onclick='save_accext();' rel='8'>Siguiente &#187;</a>
<a href='#' class='prev-tab mover' onclick='save_accext();' rel='6'>&#171; Atras</a>
</div>
<div id="paso-8" class="ui-tabs-panel">

<script type="text/javascript">
function generarpresupuesto(){	

	var rated_encoded = JSON.stringify(wardrobe);
	var req =	$.ajax({
				type: 'POST',
				url:'php/presupuesto.php',
	            data:	"rated="+rated_encoded,
	            // Mostramos un mensaje con la respuesta de PHP
	            success: function(data) {
					document.getElementById("presupuesto").innerHTML=data
	            }
	        })
	

}	
</script>

<div id="presupuesto"></div>



<a href='#' class='prev-tab mover' rel='7'>&#171; Atras</a>
</div>

</div>

<div id="ui-tabs-panel" class="links">
	<a class="backto" href="wwww.armariossemiems.es">Armarios <strong>Semiems</strong></a>
</div>


</div>

<!-- POPUP Interior Division  --> 
<div id="popup" style="display: none;">
</div>	
<!-- -->

</body>

</html>