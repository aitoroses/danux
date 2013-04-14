@layout('home.default')

@section('tab')
{{ HTML::script('semiems/js/tabs/tab6.js') }}



<div id="paso-6" class="ui-tabs-panel">
	<h2>Seleccione acabado del marco/jamba</h2>
    <div id="containerp"></div>
    <div id="sel_marco">
    <div id="marco_sel">No se ha cargado el marco.</div>
    <a href="#" class='submit-button' onClick="popup.fetch({name: 'marco'});">Cambiar Marco</a>
	</div>	
	
<a href='#' class='next-tab mover' rel='7'>Siguiente &#187;</a>
<a href='#' class='prev-tab mover' rel='5'>&#171; Atras</a>
</div>

@endsection
@section('help')
<div id="close-help"><a href="#" onClick="App.Help.close();"><img src="semiems/img/close.png"/></a></div>
<h1>Ayuda Tab 6</h1>



@endsection