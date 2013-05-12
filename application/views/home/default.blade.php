<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>{{$title}}</title>
	<meta name = "viewport" content = "height=device-height, width=device-width, maximum-scale = 1, minimum-scale=1" />	
	<!-- STYLES -->
	<!-- {{ HTML::style('semiems/css/example.css') }} -->
	{{ HTML::style('semiems/css/stylep.css') }}
	<!-- {{ HTML::style('semiems/css/tables.css') }} -->
	{{ HTML::style('semiems/css/chardinjs.css') }}

	
	<!-- SCRIPTS -->
	{{ HTML::script('semiems/js/lib/jquery-1.9.1.min.js') }}
	{{ HTML::script('semiems/js/lib/jquery-migrate-1.1.1.min.js') }}

	{{ HTML::script('semiems/js/lib/kinetic-v4.5.0.min.js') }}

	{{ HTML::script('semiems/js/lib/underscore-min.js') }}
	{{ HTML::script('semiems/js/lib/backbone-min.js') }}
	
	{{ HTML::script('semiems/js/lib/chardinjs.min.js') }}


	<!-- OBJECT SCRIPTS -->
	{{ HTML::script('semiems/js/src/modelo.js') }}
	{{ HTML::script('semiems/js/src/popup.js') }}
	{{ HTML::script('semiems/js/src/history.js') }}
	

	<!-- CUSTOM SCRIPTS -->
	{{ HTML::script('semiems/js/src/helper.js') }}
	{{ HTML::script('semiems/js/src/pinta_arm.js') }}
	{{ HTML::script('semiems/js/src/indicator.js') }}

	<!-- Init Variables -->
	{{ HTML::script('semiems/js/src/init.js') }}
	<!-- CUSTOM SCRIPTS -->
	{{ HTML::script('semiems/js/src/tabs/default.js') }}

</head>
<body data-wardrobe={{ $id_wardrobe }}>
	<div class="fixed">
		<nav class="top-bar">
			<ul class="title-area">
			    <!-- Title Area -->
			    <li class="name">
			      	<h1><a>Semiems</a></h1>
			    </li>
			    <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
			    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
	  		</ul>
	  		<section class="top-bar-section">
			    <!-- Left Nav Section -->
			    <ul class="left">
			      <li class="divider"></li>
			      <li><a><div id="help-btn"><div class="background"></div><div class="desc">Instrucciones</div></div></a></li>
			      <li class="divider"></li>
			      <li><a><div id="config-btn" onClick="App.Navigator.buttonConfig();"><div class="background"></div><div class="desc">Configuración</div></div></a></li>
			      <li class="divider"></li>
				  <li class="has-form">
				  	<a id="new-wardrobe" class="button">Nuevo Armario</a>
				  </li>
			    </ul>

			    <!-- Right Nav Section -->
			    <ul class="right">
			      <li><a><div id="back-btn" onclick="App.History.back_button_action();"><div class="background"></div><div class="desc">Deshacer cambios <span id="back-count">0</span></div></div></a></li>
			      <li class="divider"></li>
			      <li><a class='prev-tab mover' >&#171; Atras</a></li>
			      <li class="divider"></li>
			      <li><a class='next-tab mover'>Siguiente &#187;</a></li>
			      <li class="divider hide-for-small"></li>
			      <li class="has-form">
			        <a href="logout" class="alert button">Cerrar Sesión!</a>
			      </li>
			      <li class="divider"></li>
			      <li><a>{{ $username }}</a></li>
			    </ul>
			</section>
		</nav>
	</div>
	<div class="row" style="padding-top:10px">
		<ul class="breadcrumbs">
		  <li class="current"><a>Configuracion inicial</a></li>
		  <li class="unavailable"><a>Distribucion interior</a></li>
		  <li class="unavailable"><a>Accesorios de interior</a></li>
		  <li class="unavailable"><a>Perfil o sin perfil</a></li>
		  <li class="unavailable"><a>Puertas</a></li>
		  <li class="unavailable"><a>Marco</a></li>
		  <li class="unavailable"><a>Accesorios de estructura</a></li>
		  <li class="unavailable"><a>Resumen final</a></li>
		</ul>	  
	</div>
	
	
	<div id="wardrobe-create" class="section">
		
		<div id="main">
			<section id="content">
				<div class="row">
					@yield('tab')
				</div>
			</section>
			</div>
		</div>
		<!-- WARDROBE MENU -->
		<div style="display:none;" id="wardrobemenu" data-intro="Este es el menu para seleccionar el armario" data-position="right">
			<h1>Tus armarios</h1>
			<ul>
				<?php
					if(isset($wardrobes)){
						foreach($wardrobes as $ele){
							echo "<li><a href=".$ele->id.">".$ele->name.'</a><div class="delete"></div></li>'; 
						}
					} else {
						echo "No hay armarios";
					}
				?>
				
			</ul>
			<span id="link"></span>
		</div>
	</div>

	<!-- POPUP -->
	<div id="popup" class="reveal-modal">
		<div class="content"></div>
		<a class="close-reveal-modal">&#215;</a>
	</div>
	<!-- END POPUP -->

	<!-- WELCOME -->
	@include('home.config')
	<!-- HELP NOTICE 
	<div id="help">
		<div class="content">
			@yield('help')
		</div>
		<div class="page-screen"></div>
	</div>-->
	<script src="semiems/js/foundation/foundation.js"></script>
	<script src="semiems/js/foundation/foundation.alerts.js"></script>
	<script src="semiems/js/foundation/foundation.clearing.js"></script>
	<script src="semiems/js/foundation/foundation.cookie.js"></script>
	<script src="semiems/js/foundation/foundation.dropdown.js"></script>
	<script src="semiems/js/foundation/foundation.forms.js"></script>
	<script src="semiems/js/foundation/foundation.joyride.js"></script>
	<script src="semiems/js/foundation/foundation.magellan.js"></script>
	<script src="semiems/js/foundation/foundation.orbit.js"></script>
	<script src="semiems/js/foundation/foundation.placeholder.js"></script>
	<script src="semiems/js/foundation/foundation.reveal.js"></script>
	<script src="semiems/js/foundation/foundation.section.js"></script>
	<script src="semiems/js/foundation/foundation.tooltips.js"></script>
	<script src="semiems/js/foundation/foundation.topbar.js"></script>
	<script>
	$(document).foundation();
	</script>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		$('#content').animate({opacity: 1}, 500);
	});

</html>