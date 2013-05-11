@layout('home.default')

@section('tab')
{{ HTML::script('semiems/js/src/tabs/tab3.js') }}
<div id="paso-3">
	<h1>Añadiendo accesorios de interior</h2>
	<p>Haz click sobre uno de los módulos para elegir un accesorio.</p>
	<div id="containeri"></div>
	<br>
	<div id="acc_ints"></div>
	<br>
	<p>Para continuar, haga click en <span style="font-weight: bold">siguiente</span> (menu superior derecha).</p>
</div>


@endsection

@section('help')
<div id="close-help"><a onClick="App.Help.close();"><img src="semiems/img/close.png"/></a></div>
<h1>Ayuda Tab 3</h1>



@endsection
