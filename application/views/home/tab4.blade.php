@layout('home.default')

@section('tab')
{{ HTML::script('semiems/js/src/tabs/tab4.js') }}

<div id="paso-4" class="ui-tabs-panel">
<h2>Seleccione el tipo de Perfil:</h2>
<div id="perfiles">
<div id="perfil_sel">No ha cargado el Perfil.</div>

<a class='submit-button' onclick="popup.fetch({name: 'perfil'});">Selecciona tipo de perfil</a>
</div>
<div id="perfiles2">
<div id="handles_sel">No ha cargado el tirador.</div>
<a class='submit-button' onclick="popup.fetch({name: 'handle'})">Selecciona tipo de tirador</a>
</div>
<a class='next-tab mover' rel='5'>Siguiente &#187;</a>
<a class='prev-tab mover' rel='3'>&#171; Atras</a>
</div>


@endsection
@section('help')
<div id="close-help"><a onClick="App.Help.close();"><img src="semiems/img/close.png"/></a></div>
<h1>Ayuda Tab 4</h1>



@endsection