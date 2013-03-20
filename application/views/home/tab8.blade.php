@layout('home.default')

@section('tab')

<div id="paso-8" class="ui-tabs-panel">

<script type="text/javascript">
function generarpresupuesto(){	

	var rated_encoded = JSON.stringify(wardrobe);
	var req =	$.ajax({
				type: 'POST',
				url:'php/presupuesto.php',
	            data:	"rated="+rated_encoded,
	            // Mostramos un mensaje con la respuesta de PHP
	            success: function(data) {
					document.getElementById("presupuesto").innerHTML=data
	            }
	        })
	

}	
</script>

<div id="presupuesto"></div>



<a href='#' class='prev-tab mover' rel='7'>&#171; Atras</a>
</div>


@endsection