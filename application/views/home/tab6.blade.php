@layout('home.default')

@section('tab')
{{ HTML::script('semiems/js/src/tabs/tab6.js') }}

<div id="paso-6" class="ui-tabs-panel">
	
	<div class="row">
		<div class="columns small-12 large-7">
			<h1>Configure el enjambado</h1>
			<br>
		    <div id="containerp"></div>
		</div>
		<div class="columns small-12 large-5">
		    <div id="sel_marco" data-intro="Click aqui para selecccionar el marco" data-position="left">
			    <div id="marco_sel">No se ha cargado el marco.</div>
			    <br>
			    <a class='button' onClick="popup.openPopup();popup.fetch({name: 'marco'});">Cambiar Marco</a>
			</div>
		</div>
	</div>
	<br>
	<p>Para continuar, haga click en <span style="font-weight: bold">siguiente</span> (menu superior derecha).</p>

</div>

@endsection
@section('help')
<div id="close-help"><a onClick="App.Help.close();"><img src="semiems/img/close.png"/></a></div>
<h1>Ayuda Tab 6</h1>



@endsection