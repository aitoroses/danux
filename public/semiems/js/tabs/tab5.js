//Documente ready
$(document).ready(function(){
	// Obtener el objeto
	$(document).bind('sync',function(){
		pintapuertas();
	});
	$(document).bind('sync_popup',function(){
		if(document.getElementById('distribucionPuerta')){
			$('#distribucionPuerta .element').click(function(){
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
						// de la puerta, lo iniciamos con 0
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
	});
	$(document).bind('error',function(){
		$('#containerp').html('No se ha cargado el armario');
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

Tab5Controller = {

	initialize: function(){
	},
	getDoorMaterials: function(type){
		$.ajax({
			type: 'GET',
			url: 'API/popup/view',
			data: {type: type},
			success: function(response){
				$('#materiales').html(response);
				$('#materiales .element').click(function(){
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
	},
	//Funcion que recorre las puertas y hace que la 
	// distribucion y los materiales sean iguales 
	// dependiendo de lo que selecciones 
	// (Todas iguales, Pares iguales, Impares iguales)
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
	}
}