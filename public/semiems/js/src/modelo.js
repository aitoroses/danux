WardrobeModel = new Object({
	wardrobe: {},
	initialize: function(){
		return this.createJson();
	},
	createJson: function(){
		var npuertas = document.frm.npuertas.value;
		posicion_impar="0";
		if(npuertas%2 != 0 & document.frm.puerta.value == 1){	
			posicion_impar=document.frm.donde_imp.value;
		}
		this.wardrobe ={
			data:{
							"name":document.frm.name.value,
	        				"width":document.frm.mancho.value,
	        				"height":document.frm.malto.value,
	        				"prof":document.frm.mprof.value,
							"nmods":"0",
	        				"doors":document.frm.npuertas.value,
	        				"typedoor":document.frm.puerta.value,
	        				"paritypos":posicion_impar,
	        				"handle":"0",
	        				"tperfil":"0",
	        				"perfil":"0",
	        				"marco":"0"
				},
			modules:[],
			doors:[],
			accext:[]
			};
			
			//Creamos los modulos
			
			if (document.frm.puerta.value==0 || document.frm.puerta.value==2){
		    //Correderas
				var npuertas = document.frm.npuertas.value;
				var nmod = document.frm.npuertas.value;
				this.wardrobe.data.nmods=nmod;
				for(x=0;x<nmod;x++){
						this.wardrobe.modules.push({ 
												double:0,
												ddouble:0,
												width:document.frm.mancho.value/nmod,
												height:document.frm.malto.value,
												ref1:0,
												ref2:0,
												accint:[]
											});
				}
			}else if (document.frm.puerta.value==1){
			//Batientes
				var npuertas=document.frm.npuertas.value;
				var nmod = Math.round(parseInt(document.frm.npuertas.value)/2);			
				var ancho_puerta=document.frm.mancho.value/document.frm.npuertas.value;
				var ancho_puerta_d=(document.frm.mancho.value/document.frm.npuertas.value)*2;
				this.wardrobe.data.nmods=nmod;			
				
				for(x=0;x<nmod;x++){
				
				if (npuertas%2==0){	
					var anchoo_puerta = ancho_puerta_d				
				}else{
					var dnd_imp=parseInt(document.frm.donde_imp.value-1)/2;
					if (x==dnd_imp){
						var anchoo_puerta = ancho_puerta;
					}else{
						var anchoo_puerta = ancho_puerta_d;
					}
				}
					this.wardrobe.modules.push({ 
											double:0,
											ddouble:0,
											width:anchoo_puerta,
											height:document.frm.malto.value,
											ref1:0,
											ref2:0,
											accint:[]
										});
				}
			}
			//Creamos las puertas
	 		for(x=0;x<npuertas;x++){	
	 			this.wardrobe.doors.push({ 
	 									type:"1",
	 									material:{
	 										0:0
	 									}
	 								}); 
	 		}
	},
	guardarJson: function(){
		$.ajax({
			type: 'POST',
			url:'API/budget',
	        data:   {wardrobe: WardrobeModel.getWardrobe()},
	        success: function(data) {
	        	if(data !== "OK"){
	        		$('#errors').html(data)
	        	}
	        	else {
	        		App.Navigator.goNext();
	        	}
	        },
	        error: function(){
	        	alert('Hubo un error');    
			}
		});
	},
	save: function(){
		id = $('body').data('wardrobe');
		$.ajax({
	        type: "PUT",
            url: "API/json/" + id,
            dataType: "json",
            data:   {wardrobe: WardrobeModel.getWardrobe()},
            success: function(response){
            	//alert('Se ha actualizado el armario');
            	$(document).trigger('sync_save');
            },
            error: function(){
            	alert('Error: No se ha sincronizado el armario');
            }
        });  
	},
	fetch: function (){
		id = $('body').data('wardrobe');
		$.ajax({
	        type: "GET",
            url: "API/json/" + id,
            dataType: "json",
            success: function(response){
            	WardrobeModel.wardrobe = response;
            	$(document).trigger('sync');
            	console.log(WardrobeModel.getWardrobe());
            },
            error: function(){
            	alert('Error: No se ha cargado el armario');
            	$(document).trigger('error');
            }
        });  
	},
	getWardrobe: function(){
		return this.wardrobe;
	},
	rebuildData: function(){
		_data = this.wardrobe.data;
		_frm = document.frm;
		
		_data.name = _frm.name.value;
	}
});
