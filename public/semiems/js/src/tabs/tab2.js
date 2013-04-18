//Documente ready
$(document).ready(function(){
	// REGISTRAR EVENTOS
	$(document).on('undo', function(){
		App.History.undoWardrobe();
		pintamodulos();
	})
	// Evento para guardar en stack
	$(document).on('stack', function(){
		App.History.saveWardrobe();
	})
	// Obtener el objeto
	$(document).bind('sync',function(){
		pintamodulos();
		App.History.saveWardrobe();

	});
	$(document).bind('sync_popup',function(){
		$('#sel_interiores .element').click(function(){
			$(document).trigger('stack');
			var ref = parseInt($(this).data('ref'));
			var auxitem=moduleselect.substring(1,2)
			if (moduleselect.substring(3,4)==1){
				WardrobeModel.getWardrobe().modules[auxitem].ref1=ref
			
			}else if (moduleselect.substring(3,4)==2){
				WardrobeModel.getWardrobe().modules[auxitem].ref2=ref
			}
			pintamodulos();
			popup.closePopup();

		});

	});
	$(document).bind('sync_save', function(){
			App.Navigator.goNext();
	})

	$(document).bind('error',function(){
		$('#containeri').html('No se ha cargado el armario');
	});

	WardrobeModel.fetch();

	$('a.next-tab').on('click',function(e){
		e.preventDefault();
		WardrobeModel.save();
	});
	$('a.prev-tab').on('click',function(e){
		App.Navigator.goBack();

	});

});
Tab2Controller = {
	cambia_modulo_doble: function(dist){
		$(document).trigger('stack');
		moduleselect_temp=moduleselect.substring(1,2);
		wardrobe.modules[moduleselect_temp].double=1;
		wardrobe.modules[moduleselect_temp].ddouble=dist;
		pintamodulos();
	    popup.closePopup();

	},
	cambiar_a_modulo_simple: function(){
		$(document).trigger('stack');
		moduleselect_temp=moduleselect.substring(1,2);
		wardrobe.modules[moduleselect_temp].double=0;
		wardrobe.modules[moduleselect_temp].ddouble=0;
		pintamodulos();
	    popup.closePopup();

	}
}



