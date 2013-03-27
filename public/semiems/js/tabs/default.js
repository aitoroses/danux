$(document).ready(function(){
	$('#wardrobemenu a').click(function(e){
		e.preventDefault();
		var id = $(this).attr('href');
		$.ajax({
			type: 'POST',
			url: 'session/' + id,
			success: function(response) {
				//alert('Se ha cargado el armario con ID '+ response)
				if (location.href !== "2"){
					location.href = "2";
				} else {
					location.href.reload(true);
				}
			},
			error: function(){
				alert('Hubo un error al cargar el identificador');
			}
		});
	});
});