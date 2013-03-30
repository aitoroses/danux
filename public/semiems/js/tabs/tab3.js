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
			location.href = "4";
		})


	});
	$('a.prev-tab').on('click',function(e){
		
		

	});

});

//Funciones AUXILIARES
var delRow = function (indice){ // Borra el accesorio en el Pop Up
// Funcion que destruye el elemento actual una vez echo el click
$("#rut" + indice).remove ();

  var idx = wardrobe.modules[moduleselect].accint.indexOf(indice); // Find the index
            if(idx!=-1) {
              wardrobe.modules[moduleselect].accint.splice(idx, 1);
            }
 }