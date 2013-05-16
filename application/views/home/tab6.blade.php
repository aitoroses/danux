@layout('home.default')

@section('tab')
{{ HTML::script('semiems/js/src/tabs/tab6.js') }}

<div id="paso-7">
	<div class="row shadow bg">
	  <div class="small-10 large-11 small-centered large-centered columns">
	  	<h1>Configura los accesorios de estructura</h1>
	  </div>
	</div>
	<div class="row shadow bg">
		<div class="small-12 large-10 small-centered large-centered columns">

			<p>Haz click para seleccionar accesorios a la lista:</p>

			 <a class='button' onclick="popup.openPopup();popup.fetch({name: 'accesoriosExterior'});" data-intro="Click para añadir los accesorios de exterior" data-position="bottom">Agregar Accesorio</a>

			 <div id="acc_sel"></div>
		</div>
	</div>
	<div class="row shadow bg">
		<div class="small-12 large-6 large-offset-6 columns">
			<br>
			<br>
			<br>
			<p>Para continuar, haga click en <span style="font-weight: bold">siguiente</span> (menu superior derecha).</p>
		</div>
	</div>	
</div>
@endsection
@section('help')
<div id="close-help"><a onClick="App.Help.close();"><img src="semiems/img/close.png"/></a></div>
<h1>Ayuda Tab 7</h1>



@endsection