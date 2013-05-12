@layout('home.default')

@section('tab')
{{ HTML::script('semiems/js/src/tabs/tab4.js') }}
{{ HTML::script('semiems/js/src/tabs/tab5.js') }}


<div id="paso-4">
	<h1>Configuracion de las puertas</h1>
	<h3>En 3 pasos</h3>
	<br>
	<ul>
		<li style="border-bottom: 1px solid;">
			<p><h4>Primero, se debe indicar el tipo de perfil:</h4></p>
			<p>( <span style="font-weight: bold">Sin perfil</span> tambien forma parte de esta configuración )</p>
			<ul>
				<li>En caso de desear una puerta <span style="font-weight: bold">sin perfil</span>, escoger puerta lisa.</li>
				<li>En caso de desear una puerta <span style="font-weight: bold">con perfil</span>, escoger el tipo de perfil deseado.</li>
			</ul>
			<p>
				<div id="perfiles">
					<div id="perfil_sel">No se ha configurado la puerta</div>
					<a class='button' onclick="popup.openPopup();popup.fetch({name: 'perfil'});">Configuración del tipo de puerta</a>
				</div>
			</p>
		</li>
		<br>
		<li style="border-bottom: 1px solid;">
			<div id="paso-5">
				<p><h4>Segundo, configura la estructura y los materiales</h4></p>
				<ol>
					<li>Elige haciendo click las puertas o paneles que desea configurar.</li>
					<li>Se pueden seleccionar varios paneles o puertas al mismo tiempo.</li>
					<li>Se puede deseleccionar volviendo a hacer click</li>
				</ol>
				<br>
				<p>NOTA: Lo mas facil es configurar la estructura primero, y una vez terminado configurar los materiales.</p>
				<br>
				<div id="containerp"></div>
				<br>
				<div id="sel2">
					<a class="button" onClick="popup.openPopup();popup.fetch({name: 'distribucionPuerta'});">Estructura de las puertas</a>
					<a class="button" onClick="popup.openPopup();popup.fetch({name: 'materialesPuerta'});">Elige el tipo de material</a> 
				</div>
				<!--- <div id="acabado_perfil">No hay datos para saberlo. (Añada mas materiales)</div> -->
			</div>
			<br>
		</li>
		<br>
		<li style="border-bottom: 1px solid;">
			<p><h4>Por ultimo, seleccione el tipo de tirador para la puerta</h4></p>
			<div id="perfiles2">
				<div id="handles_sel">No ha cargado el tirador.</div>
				<a class='button' onclick="popup.openPopup();popup.fetch({name: 'handle'})">Selecciona tipo de tirador</a>
			</div>
			<br>
		</li>
	</ul>
	
		

	
</div>

<br>
<p>Para continuar, haga click en <span style="font-weight: bold">siguiente</span> (menu superior derecha).</p>


@endsection
@section('help')
<div id="close-help"><a onClick="App.Help.close();"><img src="semiems/img/close.png"/></a></div>
<h1>Ayuda Tab 4</h1>



@endsection