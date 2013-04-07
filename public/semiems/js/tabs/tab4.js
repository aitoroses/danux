//Documente ready
$(document).ready(function(){
	// Obtener el objeto
	$(document).bind('sync',function(){
		Tab4Controller.pintarPerfil();
		Tab4Controller.pintarTirador();

	});
	$(document).bind('sync_popup',function(){
		if(document.getElementById('handles')){
			$('#handles .element').click(function(){
				// Comportamiento del click
				var id = $(this).data('id')
				Tab4Controller.añadirTirador(id);
				popup.closePopup();
			});
		}
	});
	$(document).bind('sync_save',function(){
		Tab4Controller.pintarPerfil();
		Tab4Controller.pintarTirador();
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
});

Tab4Controller = {

	initialize: function(){
	},
	pintarPerfil: function(){
		//Borro y pongo espacio para que que 
		// hay debajo del div no se mueva y 
		// provoque errores visuales
		$("#perfil_sel").html("&nbsp"); 
		$.ajax({
       		type: 'GET',  
            url: 'API/asides/getPerfil',
            success: function(data) {  
                $("#perfil_sel").append(data)
            }  
        })			
	},
	pintarTirador: function(){
		//Borro y pongo espacio para que que 
		// hay debajo del div no se mueva y 
		// provoque errores visuales
		$("#handles_sel").html("&nbsp"); 
		$.ajax({
       		type: 'GET',  
            url: 'API/asides/getTirador',
            success: function(data) {  
                $("#handles_sel").append(data)
            }  
        })			
	},
	añadirTirador: function(id){
		WardrobeModel.wardrobe.data.handle=id;
		WardrobeModel.save();
	},
	añadirPerfil: function (type_perfil){
		WardrobeModel.wardrobe.data.tperfil=type_perfil;
		WardrobeModel.save();
  		popup.closePopup();	
	}
}



