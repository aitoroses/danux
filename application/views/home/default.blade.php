<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>{{$title}}</title>
	<meta name = "viewport" content = "height=device-height, width=device-width, maximum-scale = 1, minimum-scale=1" />	
	<!-- STYLES -->
	{{ HTML::style('semiems/css/example.css') }}
	{{ HTML::style('semiems/css/stylep.css') }}
	{{ HTML::style('semiems/css/tables.css') }}
	{{ HTML::style('semiems/css/tabs.css') }}
	{{ HTML::style('semiems/css/chardinjs.css') }}

	
	<!-- SCRIPTS -->
	{{ HTML::script('semiems/js/lib/jquery-1.9.1.min.js') }}
	{{ HTML::script('semiems/js/lib/jquery-migrate-1.1.1.min.js') }}

	{{ HTML::script('semiems/js/lib/kinetic-v4.3.2.min.js') }}

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

	<!-- Init Variables -->
	{{ HTML::script('semiems/js/src/init.js') }}
	<!-- CUSTOM SCRIPTS -->
	{{ HTML::script('semiems/js/src/tabs/default.js') }}

</head>
<body data-wardrobe={{ $id_wardrobe }}>
	<!-- POPUP Interior Division  -->
	<div id="page_screen"></div>
	<div id="popup" style="display: none;"></div>
	<!-- POPUP   -->
	<header id="header" class="cf">
	<nav id="nav">
		<div id="menu_right">
			<div id="back-btn" onclick="App.History.back_button_action();"><div class="background"></div><div class="desc">Atras <span id="back-count">0</span></div></div>
			<div id="config-btn" onClick="App.Navigator.buttonConfig();"><div class="background"></div><div class="desc">Configuración</div></div>
			<div id="help-btn"><div class="background"></div><div class="desc">Instrucciones</div></div>
			
		</div>
		<h1 style="padding: 5px;">Bienvenido, {{ $username }}</h1>
				<a id="close-btn" href="logout" class="logout">Cerrar session</a>
	</nav>
	</header>
	<div id="wardrobe-create" class="section">
		<div id="main">
			<h1>Configura tu armario:</h1>

			<div id="tabs" class="ui-tabs ui-widget ui-widget-content ui-corner-all">
					
				<ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
					<!-- Normalmente las vistas no operan sobre datos y delegan esa labor en el controlador -->
					@if ( $id == 1 )
							<li class='ui-state-default ui-corner-top ui-tabs-selected ui-state-active'><a>1. Configuración inicial</a></li>
					@else
							<li class='ui-state-default'><a>1. Configuración inicial</a></li>
					@endif

					@if ( $id == 2 )
							<li class='ui-state-default ui-corner-top ui-tabs-selected ui-state-active'><a >2. Interior</a></li>
					@else
							<li class='ui-state-default'><a >2. Interior</a></li>
					@endif

					@if ( $id == 3 )
							<li class='ui-state-default ui-corner-top ui-tabs-selected ui-state-active'><a  >3. Accesorios Int</a></li>
					@else
							<li class='ui-state-default'><a >3. Accesorios Int</a></li>
					@endif

					@if ( $id == 4 )
							<li class='ui-state-default ui-corner-top ui-tabs-selected ui-state-active'><a  >4. Perfil</a></li>
					@else
							<li class='ui-state-default'><a >4. Perfil</a></li>
					@endif

					@if ( $id == 5 )
							<li class='ui-state-default ui-corner-top ui-tabs-selected ui-state-active'><a  >5. Puertas</a></li>
					@else
							<li class='ui-state-default'><a >5. Puertas</a></li>
					@endif

					@if ( $id == 6 )
							<li class='ui-state-default ui-corner-top ui-tabs-selected ui-state-active'><a  >6. Marco</a></li>
					@else
							<li class='ui-state-default'><a >6. Marco</a></li>
					@endif

					@if ( $id == 7 )
							<li class='ui-state-default ui-corner-top ui-tabs-selected ui-state-active'><a  >7. Accesorios Ext</a></li>
					@else
							<li class='ui-state-default'><a >7. Accesorios Ext</a></li>
					@endif

					@if ( $id == 8 )
							<li class='ui-state-default ui-corner-top ui-tabs-selected ui-state-active'><a  >8. Resumen Final</a></li>
					@else
							<li class='ui-state-default'><a >8. Resumen Final</a></li>
					@endif

					<li class="shadowtab"></li>
				</ul>
				
			<section id="content" style="opacity: 0;">
				@yield('tab')
			</section>
			</div>
		</div>
		<!-- WARDROBE MENU -->
		<div id="wardrobemenu" data-intro="Este es el menu para seleccionar el armario" data-position="right">
			<h1>Tus armarios</h1>
			<ul>
				<?php
					if(isset($wardrobes)){
						foreach($wardrobes as $ele){
							echo "<li><a href=".$ele->id.">".$ele->name.'</a><div class="delete"></div><div class="edit"></div></li>'; 
						}
					} else {
						echo "No hay armarios";
					}
				?>
				
			</ul>
			<span id="link"></span>
		</div>
	</div>
	<!-- WELCOME -->
	@include('home.config')
	<!-- HELP NOTICE -->
	<div id="help">
		<div class="content">
			@yield('help')
		</div>
		<div class="page-screen"></div>
	</div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		$('#content').animate({opacity: 1}, 300);
	});
</script>
</html>