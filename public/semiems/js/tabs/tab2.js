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

// Cambio a modulo doble
function cambia_modulo_doble(dist) {
	moduleselect_temp=moduleselect.substring(1,2);
	wardrobe.modules[moduleselect_temp].double=1;
	wardrobe.modules[moduleselect_temp].ddouble=dist;
	pintamodulos();
    popup.closePopup();
};
/*// Cambio a modulo doble
function cambia_modulo_doble(tmod,dist) {
	moduleselect_temp=moduleselect.substring(1,2);
	wardrobe.modules[moduleselect_temp].double=tmod;
	wardrobe.modules[moduleselect_temp].ddouble=dist;
	pintamodulos();
    popup.closePopup();
};*/
function cambiar_a_modulo_simple() {
	moduleselect_temp=moduleselect.substring(1,2);
	wardrobe.modules[moduleselect_temp].double=0;
	wardrobe.modules[moduleselect_temp].ddouble=0;
	pintamodulos();
    popup.closePopup();
};

var optionalMenu = function(){
	$('.select').change(function(){
        if($(this).val() === '0')
        {
            $('.content-popup .optional').hide();
        }
        else
        {
            $('.content-popup .optional').show();
        }
    });
};

