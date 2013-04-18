@layout('home.default')

@section('tab')
{{ HTML::script('semiems/js/src/tabs/tab5.js') }}

<div id="paso-5" class="ui-tabs-panel">
<h2>Configura las puertas</h2>
<span>Seleccione las puertas o paneles y clicke a la derecha una de las dos opciones</span>
<div id="sel2">

<a class="submit-button" onClick="popup.fetch({name: 'distribucionPuerta'});">Tipo de puertas</a>
<a class="submit-button" onClick="popup.fetch({name: 'materialesPuerta'});">Materiales</a> 


</div>


<div id="containerp"></div>

<a onClick="Tab5Controller.cambia_puerta('all')">Todas iguales</a>
<a onClick="Tab5Controller.cambia_puerta('par')">Pares iguales</a>
<a onClick="Tab5Controller.cambia_puerta('impar')">impares iguales</a>

<div id="acabado_perfil">No hay datos para saberlo. (Añada mas materiales)</div>


<a class='next-tab mover' rel='6'>Siguiente &#187;</a>
<a class='prev-tab mover' rel='4'>&#171; Atras</a>
</div>



@endsection
@section('help')
<div id="close-help"><a onClick="App.Help.close();"><img src="semiems/img/close.png"/></a></div>
<h1>Ayuda Tab 5</h1>



@endsection