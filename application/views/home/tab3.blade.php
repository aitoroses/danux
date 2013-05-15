@layout('home.default')

@section('tab')
{{ HTML::script('semiems/js/src/tabs/tab3.js') }}
<div id="paso-3">
	<div class="row shadow bg">
	  <div class="small-10 large-9 small-centered large-centered columns">
	  	<h1>Añadiendo accesorios de interior</h2>
	  </div>
	</div>
	<div class="row shadow bg">
		<div class="small-12 large-9 small-centered large-centered columns">
			<p>Haz click sobre uno de los módulos para elegir un accesorio.</p>
			<div id="containeri"></div>
			<br>
			<br>
		</div>
	</div>
	<div class="row shadow bg">
		<div class="small-12 large-6 small-centered large-centered columns">
			<div id="acc_ints"></div>
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
<h1>Ayuda Tab 3</h1>



@endsection
