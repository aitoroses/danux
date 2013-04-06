@layout('home.default')

@section('tab')
{{ HTML::script('semiems/js/tabs/tab4.js') }}

<div id="paso-4" class="ui-tabs-panel">
<h2>Seleccione el tipo de Perfil:</h2>
<div id="perfiles">
<div id="perfil_sel">No ha cargado el Perfil.</div>

<a href='#' class='submit-button' onclick="popup.fetch({name: 'perfil'});">Selecciona tipo de perfil</a>
</div>
<div id="perfiles2">
<div id="handles_sel">No ha cargado el tirador.</div>
<a href='#' class='submit-button' onclick="popup.fetch({name: 'handle'})">Selecciona tipo de tirador</a>
</div>
<a href='#' class='next-tab mover' rel='5'>Siguiente &#187;</a>
<a href='#' class='prev-tab mover' rel='3'>&#171; Atras</a>
</div>


@endsection