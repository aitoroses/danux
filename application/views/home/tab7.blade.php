@layout('home.default')

@section('tab')
{{ HTML::script('semiems/js/tabs/tab7.js') }}

<div id="paso-7" class="ui-tabs-panel">
<h2>Añade Accesorios de exterior</h2>

 <a href="#" class='submit-button' onclick="popup.fetch({name: 'accesoriosExterior'});">Agregar Accesorio</a>

 <div id="acc_sel"></div>

<a href='#' class='next-tab mover' rel='8'>Siguiente &#187;</a>
<a href='#' class='prev-tab mover' rel='6'>&#171; Atras</a>
</div>


@endsection