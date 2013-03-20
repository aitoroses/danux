@layout('home.default')

@section('tab')



<div id="paso-7" class="ui-tabs-panel">
<h2>Añade Accesorios de exterior</h2>
<form id="forma2" name="forma2" method="post">
 <a href="#" onclick="AgregarCampos2();">Agregar Accesorio</a>
 <ul>
 <div id="accext">
 </ul>
 
<script type="text/javascript">
var nextinput2 = 0;
function AgregarCampos2(){
nextinput2++;

var acc2 = $.ajax({
          type: 'POST',  
            url: 'contenido/accext.php',
            async: false,
            data: {
            "nextin2" : nextinput2
          }, 
            success: function(data) { 

campo2 = '<li id="rut2'+nextinput2+'">'+data+'<a href="#" onChange="" onClick="delRow2(' + nextinput2 + ')"> Borrar Accesorio </a></li>';

            }  
        })  


$("#accext").append(campo2);

}

var delRow2 = function (indice2){
// Funcion que destruye el elemento actual una vez echo el click
$("#rut2" + indice2).remove();

 }

</script>
<a href='#' class='next-tab mover' onclick='save_accext();' rel='8'>Siguiente &#187;</a>
<a href='#' class='prev-tab mover' onclick='save_accext();' rel='6'>&#171; Atras</a>
</div>


@endsection