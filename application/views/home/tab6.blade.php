@layout('home.default')

@section('tab')
{{ HTML::script('semiems/js/tabs/tab6.js') }}



<div id="paso-6" class="ui-tabs-panel">
	<h2>Seleccione acabado del marco/jamba</h2>
    <div id="containerp"></div>
    <div id="sel_material2">
    <div id="marco_sel">No se ha cargado el marco.</div>
    <a href="#" class='submit-button' onClick="popup.fetch({name: 'marco'});">Tipo de puertas</a>
	</div>	
	
<a href='#' class='next-tab mover' rel='7'>Siguiente &#187;</a>
<a href='#' class='prev-tab mover' rel='5'>&#171; Atras</a>
</div>

@endsection