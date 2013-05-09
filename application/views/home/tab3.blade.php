@layout('home.default')

@section('tab')
{{ HTML::script('semiems/js/src/tabs/tab3.js') }}
<div id="paso-3" class="ui-tabs-panel">
<h2>Añade Accesorios de interior</h2>

<div id="containeri" data-intro="Seleccione los modulos para añadirles accesorios" data-position="top"></div>
<div id="acc_ints" data-intro="Aqui ira la lista de accesorios que seleccione" data-position="top"></div>

<a class='next-tab mover' rel='4'>Siguiente &#187;</a>
<a class='prev-tab mover' rel='2'>&#171; Atras</a>

</div>


@endsection

@section('help')
<div id="close-help"><a onClick="App.Help.close();"><img src="semiems/img/close.png"/></a></div>
<h1>Ayuda Tab 3</h1>



@endsection
