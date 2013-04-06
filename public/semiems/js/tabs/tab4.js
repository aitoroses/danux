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



function cargar_perfiles(){
	var type_perfil = parseInt(wardrobe.data.tperfil);

	if (type_perfil==0){
  		$('#perfil_sel').html("No has seleccionado perfil");   
  	}else if (type_perfil==1){
  		$('#perfil_sel').html("Has seleccionado perfil Minimalista");
  	}else if (type_perfil==2){
  		$('#perfil_sel').html("Has seleccionado perfil Clasico");
  	}else if (type_perfil==3){
  		$('#perfil_sel').html("Has seleccionado puerta sin perfil (Lisa)");
  	}else if (type_perfil==4){
  		$('#perfil_sel').html("Has seleccionado puerta con perfil");
  	}


}
function get_perfiles(type_perfil){

  	if (type_perfil==1){
  		wardrobe.data.tperfil=type_perfil;
  	}else if (type_perfil==2){
  		wardrobe.data.tperfil=type_perfil;
  	}else if (type_perfil==3){
  		wardrobe.data.tperfil=type_perfil;
  	}else if (type_perfil==4){
  		wardrobe.data.tperfil=type_perfil;
  	}
  	Close_popup();
  	acabado_perfil();
  	guardarJson();
}


