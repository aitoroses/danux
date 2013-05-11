@layout('home.default')

@section('tab')
{{ HTML::script('semiems/js/src/tabs/tab2.js') }}

<div id="paso-2">
	<div class="row">
		<div class="columns small-12 large-8">
			<h2>Configura el interior</h2>
			<div id="containeri"></div>
			
		</div>
	</div>
	<div class="row">
		<div class="columns small-12 large-8">
			<ul>
				<li>Haz click en cada uno de los modulos para agregar accesorios</li>
			</ul>
		</div>
	</div>
</div>

@endsection
@section('help')
<div id="close-help"><a onClick="App.Help.close();"><img src="semiems/img/close.png"/></a></div>
<h1>Ayuda Tab 2</h1>



@endsection