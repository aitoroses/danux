<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>{{ $title }}</title>
	<meta name = "viewport" content = "height=device-height, width=device-width, maximum-scale = 1, minimum-scale=1" />	
	<!-- STYLES -->
	<!-- {{ HTML::style('semiems/css/example.css') }} -->
	{{ HTML::style('semiems/css/stylep.css') }}
	<!-- {{ HTML::style('semiems/css/tables.css') }} -->

	<!-- FONT-AWESOME -->
	{{ HTML::style('lib/font-awesome/css/font-awesome.min.css') }}
	<!-- {{ HTML::style('lib/css/chardinjs.css') }} -->

	
	<!-- SCRIPTS -->
	{{ HTML::script('semiems/js/lib/jquery-1.9.1.min.js') }}
	{{ HTML::script('semiems/js/lib/jquery-migrate-1.1.1.min.js') }}

	{{ HTML::script('semiems/js/lib/kinetic-v4.5.0.min.js') }}

	{{ HTML::script('semiems/js/lib/underscore-min.js') }}
	{{ HTML::script('semiems/js/lib/backbone-min.js') }}
	
	{{ HTML::script('semiems/js/lib/chardinjs.min.js') }}
	{{ HTML::script('semiems/js/lib/modernizr.js') }}


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
	<div id="outer">
		<div id="inner">
			<div class="fixed">
				<nav class="top-bar">
					<ul class="title-area">
					    <!-- Title Area -->
					    <li class="name">
					      	<h1><a>Semiems</a></h1>
					    </li>
					    <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
					    <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
			  		</ul>
			  		<section class="top-bar-section">
					    <!-- Left Nav Section -->
					    <ul class="left">
					      <!--<li class="divider"></li>
					      <li><a><div id="help-btn"><div class="background"></div><div class="desc">Instrucciones</div></div></a></li>
					      <li class="divider"></li>
					      <li><a><div id="config-btn" onClick="App.Navigator.buttonConfig();"><div class="background"></div><div class="desc">Configuración</div></div></a></li>
					      <li class="divider"></li>
						  <li class="has-form">
						  	<a id="new-wardrobe" class="button">Nuevo Armario</a>
						  </li>-->
						  <li class="divider hide-for-small"></li>
					      <li class="has-dropdown"><a href="#">Menu</a>
					        <ul class="dropdown">
					          <li class="divider"></li>
					          <li><label>Ayuda</label></li>
					          <li><a><div id="help-btn"><div class="background"></div><div class="desc">Instrucciones</div></div></a></li>
					          <li class="divider"></li>
					          <li><label>Aplicacion</label></li>
					          <li><a onClick="App.Navigator.buttonConfig();">Volver a inicio</a></li>
							  <li>
							  	<a id="new-wardrobe" onClick="WardrobeMenuController.flushWardrobe();">Crear un nuevo Armario</a>
							  </li>
					          <li class="divider"></li>
					          <li><label>Logueado como {{ $user->username }}</label></li>
					          <li class="has-form">
								<a href="logout" class="alert button">Cerrar Sesión!</a>
							  </li>
					        </ul>
					      </li>
					    </ul>
					        <!-- Right Nav Section -->
					    <ul class="right">
					    	<li class="divider"></li>
					      <li><a><div id="back-btn" onclick="App.History.back_button_action();"><div class="background"></div><div class="desc">Deshacer cambios <span id="back-count">0</span></div></div></a></li>
					      <li class="divider hide-for-small"></li>
					      <li><a class='prev-tab mover' >&#171; Paso atras</a></li>
					      <li class="divider hide-for-small"></li>
					      <li><a class='next-tab mover' onclick="setTimeout(App.errors, 500)">Siguiente &#187;</a></li>
					    </ul>

					</section>
				</nav>
			</div>
			<div class="row shadow bg" style="padding-top:10px">
				<div class="small-12 large-12 columns">
					<ul class="breadcrumbs">
					  <li data-tab="1" class="current"><a>Configuracion inicial</a></li>
					  <li data-tab="2" class="unavailable"><a>Distribucion interior</a></li>
					  <li data-tab="3" class="unavailable"><a>Accesorios de interior</a></li>
					  <li data-tab="4" class="unavailable"><a>Puertas</a></li>
					  <li data-tab="5" class="unavailable"><a>Marco</a></li>
					  <li data-tab="6" class="unavailable"><a>Accesorios de estructura</a></li>
					  <li data-tab="7" class="unavailable"><a>Resumen final</a></li>
					</ul>
				</div>  
			</div>
			<div id="wardrobe-create">
				@yield('tab')
			</div>
			<!-- WARDROBE MENU -->
			
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
			

		</div>
		<!-- INNER RING -->
		@include('home.footer')
	<!-- OUTER RING -->
	</div>
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
</script>

</html>