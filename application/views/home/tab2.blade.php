@layout('home.default')

@section('tab')
{{ HTML::script('semiems/js/src/tabs/tab2.js') }}
<div id="paso-2" class="ui-tabs-panel">
<h2>Configura los interiores</h2>

<div id="containeri"></div>

<a class='next-tab mover' >Siguiente &#187;</a>
<a class='prev-tab mover' >&#171; Atras</a>

</div>

@endsection
@section('help')
<div id="close-help"><a onClick="App.Help.close();"><img src="semiems/img/close.png"/></a></div>
<h1>Ayuda Tab 2</h1>



@endsection