//Documente ready
$(document).ready(function(){
	// Obtener el objeto
	$(document).bind('sync',function(){
		pintapuertas();
	});
	$(document).bind('sync_save',function(){
		pintapuertas();
	});
	$(document).bind('error',function(){
		$('#containerp').html('No se ha cargado el armario');
	});

	WardrobeModel.fetch();


	$('a.next-tab').on('click',function(e){
		e.preventDefault();
		$(document).bind('next', function(){
			location.href = "4";
		})


	});
	$('a.prev-tab').on('click',function(e){	
		

	});

});

Tab5Controller = {

	initialize: function(){
	},
	getDoorMaterials: function(type){
		$.ajax({
			type: 'GET',
			url: 'API/popup/view',
			data: {type: type},
			success: function(response){
				$('#materiales').html(response);
				$('#materiales .element').click(function(){
					// Comportamiento del click
					var id = $(this).data('id')
					$.each(materialselect, function(i, selection){

						var auxitem=selection.substring(1,2);
						var auxitem2=selection.substring(3,4);
						WardrobeModel.wardrobe.doors[auxitem].material[auxitem2]=id;

					})
					materialselect=[];
					WardrobeModel.save();
					popup.closePopup();
				});
			}
		});
	},


}
