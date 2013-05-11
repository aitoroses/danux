@layout('home.default')

@section('tab')
{{ HTML::script('semiems/js/src/tabs/tab4.js') }}

<div id="paso-4">
	<h1>Configuracion de las puertas</h1>
	<h3>En 3 pasos</h3>
	<br>
	<ul>
		<li style="border-bottom: 1px solid;">
			<p>Primero se debe indicar el tipo de perfil:</p>
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
			<p>Por ultimo seleccione el tipo de tirador para la puerta</p>
			<div id="perfiles2">
				<div id="handles_sel">No ha cargado el tirador.</div>
				<a class='button' onclick="popup.openPopup();popup.fetch({name: 'handle'})">Selecciona tipo de tirador</a>
			</div>
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