@layout('home.default')

@section('tab')



<div id="paso-5" class="ui-tabs-panel">
<h2>Configura las puertas</h2>
<span>Seleccione las puertas o paneles y clicke a la derecha una de las dos opciones</span>
<div id="sel2">

<a class="submit-button" href="#" onClick="pop_up('psel');">Tipo de puertas</a>
<a class="submit-button" href="#" onClick="pop_up('pdiv');">Materiales</a> 


</div>


<div id="containerp"></div>

<a href='#' onClick="cambia_puerta('all')">Todas iguales</a>
<a href='#' onClick="cambia_puerta('par')">Pares iguales</a>
<a href='#' onClick="cambia_puerta('impar')">impares iguales</a>

<div id="acabado_perfil">No hay datos para saberlo. (Añada mas materiales)</div>


<a href='#' class='next-tab mover' rel='6'>Siguiente &#187;</a>
<a href='#' class='prev-tab mover' rel='4'>&#171; Atras</a>
</div>



@endsection