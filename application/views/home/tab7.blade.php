@layout('home.default')

@section('tab')
{{ HTML::script('semiems/js/src/tabs/tab7.js') }}

<div id="paso-8" class="ui-tabs-panel">
	<div id="presupuesto"></div>
</div>


@endsection

@section('help')

<div id="close-help"><a onClick="App.Help.close();"><img src="semiems/img/close.png"/></a></div>
<h1>Ayuda Tab 8</h1>



@endsection