//Documente ready
$(document).ready(function(){
	// Obtener el objeto
	$(document).bind('sync',function(){
		pintamodulos();
	});
	$(document).bind('error',function(){
		$('#containeri').html('No se ha cargado el armario');
	});
	WardrobeModel.fetch();


	$('a.next-tab').on('click',function(e){
		e.preventDefault();
		WardrobeModel.save();
		$(document).bind('next', function(){
			location.href = "3";
		})


	});
	$('a.prev-tab').on('click',function(e){
		
		

	});

});

//Funciones AUXILIARES