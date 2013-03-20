@layout('home.default')

@section('tab')




<div id="paso-6" class="ui-tabs-panel">
	<h2>Seleccione acabado del marco/jamba</h2>
    <div id="sel_material2">
    <script type="text/javascript">
	//####################################### MARCO
	// Aux si es para tipo de material de puerta o de marco
    function mat_marc(type_material){
  	
    	$.ajax({
         		type: 'POST',  
              url: 'php/getMatDoor.php',
              data: {
      				"type" : type_material,
      				"case" : 1
    				}, 
              success: function(data) {  
                  $('#aux2').html(data);  
              }  
          })	
  
    }
    function cambio_marco(){

            if (parseInt(wardrobe.data.marco)!=0){

                $.ajax({
                    type: 'POST',  
                url: 'php/getMarco.php',
                data: {
                    "id" : parseInt(wardrobe.data.marco),
                    }, 
                success: function(data) {  
                    $('#marco_sel').html(data);  
                    }  
                })

            }else{
                $('#marco_sel').html("Por favor, seleccione un perfil.");     
            }
        }
     
    </script>
    <div id="marco_sel">Por favor, seleccione un perfil.</div>
    <a href="#" class='submit-button' onClick="pop_up('marco');">Tipo de puertas</a>

	</div>	
	
<a href='#' class='next-tab mover' rel='7'>Siguiente &#187;</a>
<a href='#' class='prev-tab mover' rel='5'>&#171; Atras</a>
</div>



@endsection