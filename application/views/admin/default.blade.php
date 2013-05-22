<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>{{$title}}</title>
	<meta name = "viewport" content = "height=device-height, width=device-width, maximum-scale = 1, minimum-scale=1" />	
	<!-- STYLES -->
	<!-- {{ HTML::style('semiems/css/example.css') }} -->
	{{ HTML::style('semiems/css/admin.css') }}
	
	<!-- SCRIPTS -->
	{{ HTML::script('semiems/js/lib/jquery-1.9.1.min.js') }}
	{{ HTML::script('semiems/js/lib/jquery-migrate-1.1.1.min.js') }}
</head>
<body>
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
						  <li class="divider hide-for-small"></li>
				          <li class="divider"></li>
				          <li><a href="{{ action('admin.distributors@index') }}">Distribuidores</a></li>
				          <li><a href="../../1#config">Volver a inicio</a></li>
					    </ul>
					    <!-- Right Nav Section -->
				        <ul class="right">
				          <li><a>Logueado como {{ $user->username }} </a></li>
				          <li class="has-form"><a href="logout" class="alert button">Cerrar Sesión!</a></li>
				      	</ul>
					</section>
				</nav>
			</div>
			<div class="row shadow bg main_div" style="padding-top:54px">
				<!--<div class="small-12 large-2 columns">
					<ul class="side-nav">
					  <li><a>Distribuidores</a></li>
					</ul>
				</div> -->
				<div class="small-12 large-12 columns">
					@yield('parts')
				</div> 
			</div>
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
</html>