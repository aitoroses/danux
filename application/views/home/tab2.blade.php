@layout('home.default')

@section('tab')
{{ HTML::script('semiems/js/src/tabs/tab2.js') }}

<div id="paso-2">
	<div class="row shadow bg">
	  <div class="small-10 large-9 small-centered large-centered columns">
	  	<h1>Configurando el interior</h1>
	  </div>
	</div>
	<div class="row shadow bg">
		<div class="columns small-12 large-8">
			<p>Haga click en cada uno de los modulos para configurarlo.</p>
			<div id="containeri"></div>
			
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
<h1>Ayuda Tab 2</h1>



@endsection