//Documente ready
$(document).ready(function(){
	// Obtener el objeto
	$(document).bind('sync',function(){
		pintamodulos();
		Tab3Controller.pintarAccs();

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
		$(document).bind('next', function(){
			location.href = "4";
		})


	});
	$('a.prev-tab').on('click',function(e){	
		

	});

	$("#mat_puerta .element").live("click", function() {		
		var ref = parseInt($(this).data('ref'));
		var auxitem=moduleselect.substring(1,2);
		Tab3Controller.añadirAccesorioInterior(ref,auxitem);
		popup.closePopup();
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
	borrarAccesorioInterior: function (id,modulo){
	// Funcion que destruye el elemento actual una vez echo el click
		var idx = WardrobeModel.wardrobe.modules[modulo].accint.indexOf(id.toString()); // Find the index
	    if(idx!=-1) {
	    	WardrobeModel.wardrobe.modules[modulo].accint.splice(idx, 1);
	    }
	    WardrobeModel.save();
	},
	añadirAccesorioInterior: function(id,modulo){
		WardrobeModel.wardrobe.modules[modulo].accint.push(id.toString());
		WardrobeModel.save();
	}
}
