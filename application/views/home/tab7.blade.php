@layout('home.default')

@section('tab')
{{ HTML::script('semiems/js/src/tabs/tab7.js') }}

<div id="paso-7" class="ui-tabs-panel">
<h2>Añade Accesorios de exterior</h2>

 <a class='submit-button' onclick="popup.fetch({name: 'accesoriosExterior'});">Agregar Accesorio</a>

 <div id="acc_sel"></div>

<a class='next-tab mover' rel='8'>Siguiente &#187;</a>
<a class='prev-tab mover' rel='6'>&#171; Atras</a>
</div>


@endsection
@section('help')
<div id="close-help"><a onClick="App.Help.close();"><img src="semiems/img/close.png"/></a></div>
<h1>Ayuda Tab 7</h1>



@endsection