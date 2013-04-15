<!doctype html>
<html lang="es">
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
	
	<!-- SCRIPTS -->
	{{ HTML::script('semiems/js/jquery-1.9.1.min.js') }}
	{{ HTML::script('semiems/js/jquery-migrate-1.1.1.min.js') }}

	{{ HTML::script('semiems/js/kinetic-v4.3.2.min.js') }}

	{{ HTML::script('semiems/js/underscore-min.js') }}
	{{ HTML::script('semiems/js/backbone-min.js') }}
	{{ HTML::script('semiems/js/application.js') }}

</head>
<body>
	<!-- POPUP Interior Division  -->
	<div id="page_screen"></div>
	<div id="popup" style="display: none;"></div>
	<!-- POPUP   -->
	<header id="header" class="cf">
	<nav id="nav">
	<div id="help-btn"><div class="background"></div><div class="desc">Instrucciones</div></div>

		<h1 style="padding: 5px;">Bienvenido {{ $username }}</h1>
				<a id="close-btn" href="logout" class="logout">Cerrar session</a>
	</nav>
	</header>
	<!-- WARDROBE MENU -->
	@if ($role == 1)
		<div id="admin_functions">
			<h1> Admin Functions </h1>
		</div>
		<div id="normal_functions">
	@else
		<div id="normal_functions" class="full_wide">
	@endif
		<h1> Diseña tu armario</h1>
		<a href="1">Ir al configurador</a>
		</div>
	<!-- HELP NOTICE -->

	<div id="help">
		<div class="content">
			@yield('help')
		</div>
		<div class="page-screen"></div>
	</div>
</body>

</html>


