@layout('home.default')

@section('tab')


<div id="paso-3" class="ui-tabs-panel">
<h2>Añade Accesorios de interior</h2>
<form id="forma" name="forma" method="post">
 <a href="#" onclick="pop_up('accint')">Agregar Accesorio</a>
 <ul>
 <div id="accint">
 </ul>
 
<script type="text/javascript">

var delRow = function (indice){
// Funcion que destruye el elemento actual una vez echo el click
$("#rut" + indice).remove ();

	var idx = wardrobe.accint.indexOf(indice); // Find the index
            if(idx!=-1) {
            	wardrobe.accint.splice(idx, 1);
            }
 }


</script>

<a href='#' class='next-tab mover' onclick='' rel='4'>Siguiente &#187;</a>
<a href='#' class='prev-tab mover' onclick='' rel='2'>&#171; Atras</a>

</div>


@endsection