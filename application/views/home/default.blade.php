<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Laravel: A Framework For Web Artisans</title>
	<meta name="viewport" content="width=device-width">
	<!-- STYLES -->
	{{ HTML::style('semiems/css/example.css') }}
	{{ HTML::style('semiems/css/stylep.css') }}
	{{ HTML::style('semiems/css/tables.css') }}
	{{ HTML::style('semiems/css/tabs.css') }}
	
	<!-- SCRIPTS -->
	{{ HTML::script('semiems/js/jquery-1.9.1.min.js') }}
	{{ HTML::script('semiems/js/jquery-migrate-1.1.1.min.js') }}

	{{ HTML::script('semiems/js/jquery-ui.min.js') }}
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


</head>
<body>
	<header class="cf">
<nav>
	<ul>
		<li style="padding: 5px;">Bienvenido $FirstName</li>
		<li><a href="#" class="logout">Cerrar session</a></li>
	</ul>
</nav>
</header>
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

@yield('tab')
</div>

<!-- POPUP Interior Division  --> 
<div id="popup" style="display: none;">
</div>
</body>
</html>