@layout('home.default')

@section('tab')
{{ HTML::script('semiems/js/src/tabs/tab7.js') }}

<div id="paso-8" class="ui-tabs-panel">
	<div class="row shadow bg">
	  <div class="small-10 large-11 small-centered large-centered columns">
	  	<h1>Resumen del presupuesto</h1>
	  	<h3>(Plantilla de test, NaN = "Numero no válido")</h3>
	  </div>
	</div>
	<div class="row shadow bg">
		<div class="small-12 large-10 small-centered large-centered columns">
			<div id="presupuesto"></div>
		</div>
	</div>
	<div id="presupuesto"></div>
</div>


@endsection

@section('help')

<div id="close-help"><a onClick="App.Help.close();"><img src="semiems/img/close.png"/></a></div>
<h1>Ayuda Tab 8</h1>



@endsection