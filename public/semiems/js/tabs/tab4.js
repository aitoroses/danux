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
	añadirPerfil: function (type_perfil,perfil){
		WardrobeModel.wardrobe.data.tperfil=type_perfil;
		WardrobeModel.wardrobe.data.perfil=perfil;
		WardrobeModel.save();
  		popup.closePopup();	
	},
	// Funcion que solo actua si las puertas son correderas
	// Asi selecciona las acabados posibles
	// Si el perfil es Minimalistas: Aluminio, Chapa Madera, Lacado y Melamina
	// Si el perfil es Clasico: Aluminio, Chapa Madera y Lacado
	getPerfilAcabados: function(type){
		$.ajax({
			type: 'GET',
			url: 'API/popup/view/perfilesView',
			data: {type: type},
			success: function(response){
				$('#materiales').html(response);
				$('#materiales .element').click(function(){
					// Comportamiento del click
					var tipoperfil = $(this).data('tipoperfil')
					var id = $(this).data('id')
					Tab4Controller.añadirPerfil(tipoperfil,id)
				});
			}
		});
	}
}



