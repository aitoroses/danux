//Documente ready
$(document).ready(function(){
	// Obtener el objeto
	$(document).bind('sync',function(){
		Tab7Controller.pintarAccesorioExterior();
	});
	$(document).bind('sync_popup',function(){
		$('#mat_puerta .element').click(function(){
			// Comportamiento del click
			var id = $(this).data('id')
			Tab7Controller.añadirAccesorioExterior(id);
			popup.closePopup();
		});
	});
	$(document).bind('sync_save',function(){
		Tab7Controller.pintarAccesorioExterior();
	});
	$(document).bind('error',function(){
	
	});

	WardrobeModel.fetch();


	$('a.next-tab').on('click',function(e){
		e.preventDefault();
		App.Navigator.goNext();
	});
	$('a.prev-tab').on('click',function(e){	
		App.Navigator.goBack();
	});
});

Tab7Controller = {

	initialize: function(){
	},
	pintarAccesorioExterior: function(){
		//Borro y pongo espacio para que que 
		// hay debajo del div no se mueva y 
		// provoque errores visuales
		$("#acc_sel").html("&nbsp"); 
		$.ajax({
       		type: 'GET',  
            url: 'API/asides/getAccExt',
            success: function(data) {  
                $("#acc_sel").append(data)
            }  
        })			
	},
	añadirAccesorioExterior: function (id){
		WardrobeModel.wardrobe.accext.push(id);
		WardrobeModel.save();
  		popup.closePopup();	
	},
	borrarAccesorioExterior: function (id){
	// Funcion que destruye el elemento actual una vez echo el click
		var idx = WardrobeModel.wardrobe.accext.indexOf(id); // Find the index
	    if(idx!=-1) {
	    	WardrobeModel.wardrobe.accext.splice(idx, 1);
	    }
	    WardrobeModel.save();
	}
}