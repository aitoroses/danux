@layout('home.default')

@section('tab')
{{ HTML::script('semiems/js/src/tabs/tab2.js') }}

<div id="paso-2">
	<div class="row">
		<div class="columns small-12 large-8">
			<h1>Configurando el interior</h1>
			<p>Haga click en cada uno de los modulos para agregar accesorios.</p>
			<div id="containeri"></div>
			
		</div>
	</div>
	<div class="row">
		<div class="columns small-12 large-8">
			<br>
			<p>Para continuar, haga click en <span style="font-weight: bold">siguiente</span> (menu superior derecha).</p>
		</div>
	</div>
</div>

@endsection
@section('help')
<div id="close-help"><a onClick="App.Help.close();"><img src="semiems/img/close.png"/></a></div>
<h1>Ayuda Tab 2</h1>



@endsection