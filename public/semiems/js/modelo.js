	function createJson(){
	
	var npuertas = document.frm.npuertas.value;
		posicion_impar="0";
	
	if(npuertas%2 != 0 & document.frm.puerta.value == 1){	
		posicion_impar=document.frm.donde_imp.value;
	}

	wardrobe ={
		data:{
						//"id":"0",
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
		accint:[],
		accext:[]
		};
		
		//Creamos los modulos
		
		if (document.frm.puerta.value==0){
	    //Correderas
			var npuertas = document.frm.npuertas.value;
			var nmod = document.frm.npuertas.value;
			wardrobe.data.nmods=nmod;
			for(x=0;x<nmod;x++){
					wardrobe.modules.push({ "double":"0","ddouble":"0","width":document.frm.mancho.value/nmod,"height":document.frm.malto.value,"ref1":0,"ref2":0 });
			}
		
		}else if (document.frm.puerta.value==1){
		//Batientes
			var npuertas=document.frm.npuertas.value;
			var nmod = Math.round(parseInt(document.frm.npuertas.value)/2);			
			var ancho_puerta=document.frm.mancho.value/document.frm.npuertas.value;
			var ancho_puerta_d=(document.frm.mancho.value/document.frm.npuertas.value)*2;
			wardrobe.data.nmods=nmod;			
			
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
				wardrobe.modules.push({ "double":"0","ddouble":"0","width":anchoo_puerta,"height":document.frm.malto.value,"ref1":0,"ref2":0 });
			}

		}
		//Creamos las puertas
 		for(x=0;x<npuertas;x++){	
 			wardrobe.doors.push({ 
 									"type":"1",
 									"material":{
 										0:0
 									}
 								}); 		
 		
 		}
 		
 		


	};
	
	
	function cargarJson(idbudget){
	
		$.ajax({
	        type: "GET",
            url: "API/budget/"+ idbudget + '/wardrobe',
            dataType: "json",
            async: false,
            success: function(response){

                window.wardrobe = new Object();
                wardrobe.data=response;

                document.frm.name.value = wardrobe.data.name;
                document.frm.malto.value = wardrobe.data.height;
                document.frm.mancho.value = wardrobe.data.width;
                document.frm.mprof.value = wardrobe.data.prof;
                document.frm.puerta.value = wardrobe.data.typedoor;
                //cambiaNumDoors();
                document.frm.npuertas.value = wardrobe.data.doors;
                //puertas_impares_bat();
                if (document.frm.npuertas.value%2!=0 && document.frm.puerta.value == 1){
                document.frm.donde_imp.value = wardrobe.data.paritypos ;
                }
                //cargar los perfiles
                //cargar_perfiles();
                //carga marco
                //cambio_marco();
                //carga tirador
                //cambio_tirador();
                //carga acc
                //AgregarAccInt();
                //accesorios
                //loadacc();
            }
        });

	     

	};
	
	function guardarJson(){
	

	     wardrobe.data.name = document.frm.name.value;
	     wardrobe.data.height = document.frm.malto.value;
	     wardrobe.data.width = document.frm.mancho.value;
	     wardrobe.data.prof = document.frm.mprof.value;
	     wardrobe.data.typedoor = document.frm.puerta.value;
	     wardrobe.data.doors = document.frm.npuertas.value;
	     wardrobe.data.paritypos = 0;
	     if (document.frm.npuertas.value%2!=0 && document.frm.puerta.value == 1){
	     	wardrobe.data.paritypos = document.frm.donde_imp.value;
	     }
    	$.ajax({

			type: 'POST',
			url:'API/budget',
            //dataType: "json",
            data:   {wardrobe: wardrobe},

            success: function(data) {
            	if(data !== "OK"){
            		$('#errors').html(data)
            	}
            	else {
            		location.href = '2';
            	}
            },
            error: function(){
            	alert('Hubo un error');
            
		        
			}
		});

	};


	function save_accext(){
	ii=[];
	if ($(document).find('#accext li select')){

	$(document).find('#accext li select').each(function(i) {
	ind=$(this.options.selectedIndex)[0]
	if (($(this.options)[ind])){
	ii.push(($(this.options)[ind]).value)}
	})

	wardrobe.accext = ii;
	}
}


