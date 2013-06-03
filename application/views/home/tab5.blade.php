@layout('home.default')

@section('tab')
{{ HTML::script('semiems/js/src/tabs/tab5.js') }}

<style type="text/css">
	canvas {
		border: ;
	}
</style>

<div id="paso-6" class="ui-tabs-panel">
	
	<div class="row shadow bg">
		<div class="columns small-12 large-7">
			<h1>Configure el enjambado</h1>
			<br>
		    <div id="containerp"></div>
		</div>
		<div class="columns small-12 large-5">
		    <div id="sel_marco" data-intro="Click aqui para selecccionar el marco" data-position="left">
			    <div id="marco_sel">No se ha cargado el marco.</div>
			    <br>
			    <a class='button' onClick="popup.openPopup();popup.fetch({name: 'marco'});">Elegir Marco</a>
			</div>
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
<h1>Ayuda Tab 6</h1>



@endsection