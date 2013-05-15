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
	module_factory: function(parent, width){
		var module = {
			configuration: {
				type: {
					parentness: 'child', 
					relationships: []
				},
			},
			accint:[],
			ddouble: "0", 
			double:"0", 
			height: "1234", 
			ref1: "0", 
			ref2: "0", 
			width: width
		};

		if (parent.configuration != null) {
			var relationships = parent.configuration.type.relationships;
			relationships.push(module);
			parent_configuration = {
				type: {
					parentness: 'parent',
					relationships: relationships
				}
			}
		} else {
			parent_configuration = {
				type: {
					parentness: 'parent',
					relationships: [module]
				}
			}
		}
		
		parent.configuration = parent_configuration;
	},
	cambia_modulo_doble: function(dist){
		$(document).trigger('stack');
		moduleselect_temp=moduleselect.substring(1,2);
		wardrobe.modules[moduleselect_temp].double=1;
		wardrobe.modules[moduleselect_temp].ddouble=dist;
		pintamodulos();
	    popup.closePopup();

	},
	cambia_modulo_doble_simetrico: function(){
		$(document).trigger('stack');
		moduleselect_temp=moduleselect.substring(1,2);
		wardrobe.modules[moduleselect_temp].double=1;
		dist=wardrobe.modules[moduleselect_temp].width;
		wardrobe.modules[moduleselect_temp].ddouble=dist/2;
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

	},
	anchuratemporal: function(){
		moduleselect_temp=moduleselect.substring(1,2);
		return wardrobe.modules[moduleselect_temp].width;
	}
}



