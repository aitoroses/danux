//Documente ready
$(document).ready(function(){
	//History
	$(document).on('undo', function(){
		App.History.undoWardrobe();
		pintamodulos();
		Tab3Controller.pintarAccs();
		WardrobeModel.save();
	})
	// Evento para guardar en stack
	$(document).on('stack', function(){
		App.History.saveWardrobe();
	})
	// Obtener el objeto
	$(document).bind('sync',function(){
		pintamodulos();
		Tab3Controller.pintarAccs();
		App.History.saveWardrobe();

	});
	$(document).bind('sync_popup',function(){
		$('#mat_puerta .element').click(function(){
			$(document).trigger('stack');
			var ref = parseInt($(this).data('ref'));
			var auxitem=moduleselect;
			Tab3Controller.añadirAccesorioInterior(ref,auxitem);
			popup.closePopup();
		});
	});
	$(document).bind('sync_save',function(){
		Tab3Controller.pintarAccs();
	});
	$(document).bind('error',function(){
		$('#containeri').html('No se ha cargado el armario');
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

Tab3Controller = {
	modselect: null,

	initialize: function(){
	},
	pintarAccs: function(){
		$("#acc_ints").html("");
		$.ajax({
       		type: 'GET',  
            url: 'API/asides/getAccInt',
            success: function(data) {  
                $("#acc_ints").append(data)
            }  
        })			
	},
	borrarAccesorioInterior: function (id,modulo,submodulo){
		if(typeof(id) == "string") id = parseInt(id);
		$(document).trigger('stack');
		// Funcion que destruye el elemento actual una vez echo el click
		if (WardrobeModel.wardrobe.modules[modulo].double == 0){
			var idx = WardrobeModel.wardrobe.modules[modulo].accint.indexOf(id); // Find the index
		    if(idx!=-1) {
		    	WardrobeModel.wardrobe.modules[modulo].accint.splice(idx, 1);
		    }
		}else{
			var idx = WardrobeModel.wardrobe.modules[modulo].configuration.type.relationships[submodulo].accint.indexOf(id); // Find the index
		    if(idx!=-1) {
		    	WardrobeModel.wardrobe.modules[modulo].configuration.type.relationships[submodulo].accint.splice(idx, 1);
		    }
		}
	    WardrobeModel.save();
	},
	añadirAccesorioInterior: function(id,modulo){
		if(typeof(id) == "string") id = parseInt(id);
		modulo_select = modulo.substring(1,2);
		submodulo_select = modulo.substring(3,4)-1;
		if (WardrobeModel.wardrobe.modules[modulo_select].double == 0){
			WardrobeModel.wardrobe.modules[modulo_select].accint.push(id);
		}else{
			WardrobeModel.wardrobe.modules[modulo_select].accint = [];
			WardrobeModel.wardrobe.modules[modulo_select].configuration.type.relationships[submodulo_select].accint.push(id);
		}
		WardrobeModel.save();
	}
}
