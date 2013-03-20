@layout('home.default')

@section('tab')



<div id="paso-4" class="ui-tabs-panel">
<script type="text/javascript">
function cargar_perfiles(){
	var type_perfil = parseInt(wardrobe.data.tperfil);

	if (type_perfil==0){
  		$('#perfil_sel').html("No has seleccionado perfil");   
  	}else if (type_perfil==1){
  		$('#perfil_sel').html("Has seleccionado perfil Minimalista");
  	}else if (type_perfil==2){
  		$('#perfil_sel').html("Has seleccionado perfil Clasico");
  	}else if (type_perfil==3){
  		$('#perfil_sel').html("Has seleccionado puerta sin perfil (Lisa)");
  	}else if (type_perfil==4){
  		$('#perfil_sel').html("Has seleccionado puerta con perfil");
  	}


}
function get_perfiles(type_perfil){

  	if (type_perfil==1){
  		wardrobe.data.tperfil=type_perfil;
  	}else if (type_perfil==2){
  		wardrobe.data.tperfil=type_perfil;
  	}else if (type_perfil==3){
  		wardrobe.data.tperfil=type_perfil;
  	}else if (type_perfil==4){
  		wardrobe.data.tperfil=type_perfil;
  	}
  	Close_popup();
  	acabado_perfil();
  	guardarJson();
}

function cambio_tirador(){

            if (parseInt(wardrobe.data.handle)!=0){

                $.ajax({
                    type: 'POST',  
                url: 'php/getHandle.php',
                data: {
                    "id" : parseInt(wardrobe.data.handle),
                    }, 
                success: function(data) {  
                    $('#handles_sel').html(data);  
                    }  
                })

            }else{
                $('#marco_sel').html("Por favor, seleccione un perfil.");     
            }
        }
</script>
<h2>Seleccione el tipo de Perfil:</h2>
<div id="perfiles">
<div id="perfil_sel">Por favor, seleccione un perfil.</div>

<a href='#' class='submit-button' onclick="pop_up('perfil')">Selecciona tipo de perfil</a>
</div>
<div id="perfiles2">
<div id="handles_sel">Por favor, selecciona un tipo de tirador.</div>
<a href='#' class='submit-button' onclick="pop_up('handle')">Selecciona tipo de tirador</a>
</div>
<a href='#' class='next-tab mover' rel='5'>Siguiente &#187;</a>
<a href='#' class='prev-tab mover' rel='3'>&#171; Atras</a>
</div>


@endsection