<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>{{$title}}</title>
	<meta name = "viewport" content = "width=device-width, maximum-scale = 1, minimum-scale=1" />	
	<!-- STYLES -->
	{{ HTML::style('semiems/css/example.css') }}
	{{ HTML::style('semiems/css/stylep.css') }}
	{{ HTML::style('semiems/css/tables.css') }}
	{{ HTML::style('semiems/css/tabs.css') }}
	
	<!-- SCRIPTS -->
	{{ HTML::script('semiems/js/jquery-1.9.1.min.js') }}
	{{ HTML::script('semiems/js/jquery-migrate-1.1.1.min.js') }}

	<!--{{ HTML::script('semiems/js/jquery-ui.min.js') }}-->
	{{ HTML::script('semiems/js/kinetic-v4.3.2.min.js') }}

	{{ HTML::script('semiems/js/underscore-min.js') }}
	{{ HTML::script('semiems/js/backbone-min.js') }}
	{{ HTML::script('semiems/js/application.js') }}

	{{ HTML::style('semiems/js/flexigrid/flexigrid.css') }}
	{{ HTML::script('semiems/js/flexigrid/flexigrid.js') }}

	{{ HTML::script('semiems/js/cond_inic.js') }}
	{{ HTML::script('semiems/js/modelo.js') }}
	{{ HTML::script('semiems/js/main.js') }}
	{{ HTML::script('semiems/js/pinta_arm.js') }}

	<!-- CUSTOM SCRIPTS -->
	{{ HTML::script('semiems/js/init.js') }}
	{{ HTML::script('semiems/js/tabs/default.js') }}



</head>
<body data-wardrobe={{ $id_wardrobe }}>
<!-- POPUP Interior Division  -->
<div id="page_screen"></div>
<div id="popup" style="display: none;"></div>
<!-- POPUP   -->
<header class="cf">
<nav>
	<ul>
		<li style="padding: 5px;">Bienvenido {{ $username }}</li>
		<li><a href="logout" class="logout">Cerrar session</a></li>
	</ul>
</nav>
</header>
<div id="main">
<h1>Configura tu armario:</h1>

<div id="tabs" class="ui-tabs ui-widget ui-widget-content ui-corner-all">
		
	<ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
<!-- Normalmente las vistas no operan sobre datos y delegan esa labor en el controlador -->
@if ( $id == 1 )
		<li class='ui-state-default ui-corner-top ui-tabs-selected ui-state-active'><a href="#1" >1. Configuración inicial</a></li>
@else
		<li class='ui-state-default'><a href="1" >1. Configuración inicial</a></li>
@endif

@if ( $id == 2 )
		<li class='ui-state-default ui-corner-top ui-tabs-selected ui-state-active'><a href="#2" >2. Interior</a></li>
@else
		<li class='ui-state-default'><a href="2" >2. Interior</a></li>
@endif

@if ( $id == 3 )
		<li class='ui-state-default ui-corner-top ui-tabs-selected ui-state-active'><a href="#3" >3. Accesorios Int</a></li>
@else
		<li class='ui-state-default'><a href="3" >3. Accesorios Int</a></li>
@endif

@if ( $id == 4 )
		<li class='ui-state-default ui-corner-top ui-tabs-selected ui-state-active'><a href="#4" >4. Perfil</a></li>
@else
		<li class='ui-state-default'><a href="4" >4. Perfil</a></li>
@endif

@if ( $id == 5 )
		<li class='ui-state-default ui-corner-top ui-tabs-selected ui-state-active'><a href="#5" >5. Puertas</a></li>
@else
		<li class='ui-state-default'><a href="5" >5. Puertas</a></li>
@endif

@if ( $id == 6 )
		<li class='ui-state-default ui-corner-top ui-tabs-selected ui-state-active'><a href="#6" >6. Marco</a></li>
@else
		<li class='ui-state-default'><a href="6" >6. Marco</a></li>
@endif

@if ( $id == 7 )
		<li class='ui-state-default ui-corner-top ui-tabs-selected ui-state-active'><a href="#7" >7. Accesorios Ext</a></li>
@else
		<li class='ui-state-default'><a href="7" >7. Accesorios Ext</a></li>
@endif

@if ( $id == 8 )
		<li class='ui-state-default ui-corner-top ui-tabs-selected ui-state-active'><a href="#8" >8. Resumen Final</a></li>
@else
		<li class='ui-state-default'><a href="8" >8. Resumen Final</a></li>
@endif

		<li class="shadowtab"></li>
	</ul>

<section id="content" style="opacity: 0;">@yield('tab')</section>
</div>
<!-- WARDROBE MENU -->
<div id="wardrobemenu">
	<h1>Tus armarios</h1>
	<ul>
		<?php
			if(isset($wardrobes)){
				foreach($wardrobes as $ele){
					echo "<li><a href=".$ele->id.">".$ele->name."</a></li>";
				}
			} else {
				echo "No hay armarios";
			}
		?>
		
	</ul>
</div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		$('#content').animate({opacity: 1}, 300);
	});
</script>
</html>