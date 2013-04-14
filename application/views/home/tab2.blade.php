@layout('home.default')

@section('tab')
{{ HTML::script('semiems/js/tabs/tab2.js') }}
<div id="paso-2" class="ui-tabs-panel">
<h2>Configura los interiores</h2>

<div id="containeri"></div>

<a href='#' class='next-tab mover' rel='3'>Siguiente &#187;</a>
<a href='#' class='prev-tab mover' rel='1'>&#171; Atras</a>

</div>

@endsection
@section('help')
<div id="close-help"><a href="#" onClick="App.Help.close();"><img src="semiems/img/close.png"/></a></div>
<h1>Ayuda Tab 2</h1>



@endsection