//Documente ready
$(document).ready(function(){
	//History
	$(document).on('undo', function(){
		App.History.undoWardrobe();
		pintapuertas();		
		WardrobeModel.save();
	})
	// Evento para guardar en stack
	$(document).on('stack', function(){
		App.History.saveWardrobe();
	})
	// Obtener el objeto
	$(document).bind('sync',function(){
		pintapuertas();
		$(document).trigger('stack');
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
		if(document.getElementById('distribucionPuerta')){
			$('#distribucionPuerta .element').click(function(){
				$(document).trigger('stack');
				// Comportamiento del click
					//distribucion de puerta elegida
					var id = $(this).data('id')
					//divisiones que tiene el tipo de
					// distribucion elegida
					var div = $(this).data('div')
					$.each(materialselect, function(i, selection){
						//Extraemos el modulo seleccionado
						var auxitem=selection.substring(1,2);
						//le introducimos la distribucion de puerta elegida
						WardrobeModel.wardrobe.doors[auxitem].type=id;
						//hacemos un array con el numero de divisiones
						// para guardar un material por cada division 
						// de la puerta, lo iniciamos con 0App.Navigator.goNext();
						var strout_div=[];
						for (var iiii=0;iiii<div;iiii++)
						{ 
							strout_div.push(0);
						}
						//Una vez creamos el array con 0s, lo introducimos en el modelo
						WardrobeModel.wardrobe.doors[auxitem].material=strout_div;
					})
					//reseteamos el array de selecciones
					materialselect=[];
					//Guardamos el modelo
					WardrobeModel.save();
					//Cerramos PopUp
					popup.closePopup();
			});
		}
	});
	$(document).bind('sync_save',function(){
		pintapuertas();
    Tab4Controller.pintarPerfil();
    Tab4Controller.pintarTirador();
	});
	$(document).bind('error',function(){
		$('#containerp').html('No se ha cargado el armario');
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

Tab5Controller = {

	initialize: function(){
	},
	getDoorMaterials: function(type){
		$.ajax({
			type: 'GET',
			url: 'API/popup/view/materialsView',
			data: {
				type: type
			},
			success: function(response){
				$('#materiales').html(response);
				$('#materiales .element').click(function(){
					$(document).trigger('stack');
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
	}
}

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





/*************************************/
function countRepeated(array){
  var r = arguments[1] || [], i = 0;
  for(; i < array.length; i++){
    if(Object.prototype.hasOwnProperty.call(array, i)){
      if(array[i] instanceof Array){
        r = countRepeated(array[i], r);
      } else {
        if(r[array[i]])
          r[array[i]]++;
        else
          r[array[i]] = 1;
      }
    }
  }
  return r;
}
/* Funciones del acabado del perfil Sin Usar

function acabado_perfil(){

	if(wardrobe.data.typedoor == 1){

		if(wardrobe.data.tperfil == 3){ //Lisa
			$('#acabado_perfil').html("No lleva Perfil.");  
		}else{ //Con perfil
			$('#acabado_perfil').html("Se ha seleccionado acabado 'Anonizado Plata'");
		}

	}else{

		$.each(wardrobe.doors, function(i, door){

			$.each(door.material, function(i, mat_door){

				var repetidos = countRepeated(a);

			})

		})
		$.ajax({
       		type: 'POST',  
            url: 'php/acabado_perf.php',
            data: {
            		"reps" : repetidos
  				}, 
            success: function(data) {  
                $('#acabado_perfil').html(data);  
            }  
        })
	}

}*/
/*
cambia_puerta: function(tipo_de_cambio){
    wardrobe = WardrobeModel.getWardrobe();
    switch(tipo_de_cambio){
      case 'all':
        for(var i in wardrobe.doors){
          temp2=wardrobe.doors[0].type;
            wardrobe.doors[i].type=temp2;
            var temp3=[];
            for(var j in wardrobe.doors[0].material){
              temp=wardrobe.doors[0].material[j];
              temp3.push(temp);
            }
          wardrobe.doors[i].material=temp3;
        }
        break;
      case 'impar':
        for(var i in wardrobe.doors){
          if(i%2==0){
            temp2=wardrobe.doors[0].type;
              wardrobe.doors[i].type=temp2;
              var temp3=[];
              for(var j in wardrobe.doors[0].material){
                temp=wardrobe.doors[0].material[j];
                temp3.push(temp);
              }
            wardrobe.doors[i].material=temp3;
          } 
        }
        break;
      case 'par':
        for(var i in wardrobe.doors){
          if(i%2!=0){
            temp2=wardrobe.doors[1].type;
              wardrobe.doors[i].type=temp2;
              var temp3=[];
              for(var j in wardrobe.doors[1].material){
                temp=wardrobe.doors[1].material[j];
                temp3.push(temp);
              }
            wardrobe.doors[i].material=temp3;
          }   
        }
        break;
    }
    WardrobeModel.save();
    pintapuertas();
  }*/