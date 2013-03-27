



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

}
/**********************************************/
function AgregarAccInt(){
$("#accint").innerHTML=""
$.each(wardrobe.accint, function(i, accs){
	$("#rut" + accs).remove ();
      $.ajax({
       		type: 'GET',  
            url: 'php/getAccInt.php',
			data: {
    				"id" : parseInt(accs)
  				},
            success: function(data) {  
                $("#accint").append(data)
            }  
        })	

})



}

function cambiaNumDoors(){

	calculo_puertas(document.frm.npuertas);
	if (document.frm.puerta.value == 2){
		$( "#tabs" ).tabs("disable", 3);
		$( "#tabs" ).tabs("disable", 4);
	}else{
		$( "#tabs" ).tabs("enable", 3);
		$( "#tabs" ).tabs("enable", 4);
	}

}

function resetWardrobe(){
	wardrobe=0;		
};	

function loadacc() { 

//document.getElementById("accint").innerHTML="";
document.getElementById("accext").innerHTML="";
//	$("#accint").append("");
	$("#accext").append("");
/*
	for(var i in wardrobe.accint)
	{
		AgregarCampos();
	}
	if ($(document).find('#accint li select')){
	$(document).find('#accint li select').each(function(i) {
			$(this).val(parseInt(wardrobe.accint[i]));

	})
}*/

	for(var i in wardrobe.accext)
	{
		AgregarCampos2();
	}
	if ($(document).find('#accext li select')){
	$(document).find('#accext li select').each(function(i) {

			$(this).val(parseInt(wardrobe.accext[i]));
	})
}
}  

//#########################Funciones Auxiliares Cambio entre Seleccion material y tipos
function cambia(sel){
	modulos_aux=sel;
};
function cambiap(sel){
	puertas_aux=sel;
};

function cambia_puerta(a){

	if(a=='all'){	
		for(var i in wardrobe.doors)
			{
				temp2=wardrobe.doors[0].type;
			    wardrobe.doors[i].type=temp2;
			   	var temp3=[];
			    for(var j in wardrobe.doors[0].material){
			    	temp=wardrobe.doors[0].material[j];
			    	temp3.push(temp);

			    }
				wardrobe.doors[i].material=temp3;
			}
	}else if(a=='impar'){
		for(var i in wardrobe.doors)
			{
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
	}else if(a=='par'){
		for(var i in wardrobe.doors)
			{
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
	}
	pintapuertas();
};


//###################################################################### POPUP
popup = {
	name: '',
	response: {},
	data: {},		// Form data
	initialize: function(object){
		this.name = object.name;
		this.data = object.data;
		$(this).bind('sync', function(){
			this.show();
		});
	},
	fetch: function(object){
		this.initialize(object);
		$.ajax({
       		type: 'GET',  
            url: 'API/popup/' + this.name,
            data: this.data,
            success: function(data) {  
                popup.response = data;
                $(popup).trigger('sync');
            }  
        });
	},
	show: function(){
		this.openPopup();
		$('#popup').html(this.response);  
	},

	openPopup: function(){
		$('#popup').fadeIn('slow');
    	var page_screen = document.getElementById('page_screen');
    	page_screen.style.height = document.body.parentNode.scrollHeight + 'px';
    	page_screen.style.display = 'block';
	},
	closePopup: function(){
		$('#popup').fadeOut('fast');
    	var page_screen = document.getElementById('page_screen');
    	page_screen.style.display = 'none';
	},
};


/*function pop_up(psel,aux) {

if(psel=='psel'){
      $.ajax({
       		type: 'POST',  
            url: 'contenido/psel.php',
            data: {

  				}, 
            success: function(data) {  
                $('#popup').html(data);  
            }  
        })	
	
	Open_popup();	
}else if(psel=='pdiv'){
		lisabat=0;
		if(wardrobe.data.typedoor==1&&wardrobe.data.tperfil==3){
			lisabat=1;
		}

     $.ajax({
       		type: 'POST',  
            url: 'contenido/pmat.php',
            data: {
            		'lisabat': lisabat 
  				}, 
            success: function(data) {  
                $('#popup').html(data);  
            }  
        })	
	Open_popup();	
}else if(psel=='isel'){
      $.ajax({
       		type: 'POST',  
            url: 'contenido/isel.php',
            data: {
    				"anchura_sel" : aux
  				}, 
            success: function(data) {  
                $('#popup').html(data);  
            }  
        })	
	
	Open_popup();
}else if(psel=='idiv'){
	
      $.ajax({
       		type: 'POST',  
            url: 'contenido/idiv.php',
            success: function(data) {  
                $('#popup').html(data);  
            }  
        })	
	
	Open_popup();
}else if(psel=='flexigrid'){
	
      $.ajax({
       		type: 'POST',  
            url: 'semiems/js/flexigrid/flexigrid.php',
            success: function(data) {  
                $('#popup').html(data);  
            }  
        })	
	Open_popup();
}else if(psel=='handle'){
	
      $.ajax({
       		type: 'POST',  
            url: 'contenido/handles.php',
            success: function(data) {  
                $('#popup').html(data);  
            }  
        })	
	Open_popup();
}else if(psel=='modules'){
	
      $.ajax({
       		type: 'POST',  
            url: 'contenido/mods.php',
            success: function(data) {  
                $('#popup').html(data);  
            }  
        })	
	Open_popup();
}else if(psel=='perfil'){
	
      $.ajax({
       		type: 'POST',  
            url: 'contenido/perfiles.php',
            data: {
    				"type" : wardrobe.data.typedoor
  				},
            success: function(data) {  
                $('#popup').html(data);  
            }  
        })	
	Open_popup();
}else if(psel=='marco'){
	
      $.ajax({
       		type: 'POST',  
            url: 'contenido/marco.php',
            success: function(data) {  
                $('#popup').html(data);  
            }  
        })	
	Open_popup();
}else if(psel=='accint'){
	
      $.ajax({
       		type: 'POST',  
            url: 'contenido/accints.php',
            success: function(data) {  
                $('#popup').html(data);  
            }  
        })	
	Open_popup();
}

};*/
//###########################################
function pdiv_cambio(divs) {
	wardrobe.doors[pselect].div=divs;
	pintapuertas();
    Close_popup();

};

function idiv_cambio(tmod,dist) {
	moduleselect_temp=moduleselect.substring(1,2);
	wardrobe.modules[moduleselect_temp].double=tmod;
	wardrobe.modules[moduleselect_temp].ddouble=dist;
	pintamodulos();
    Close_popup();

};

function imat_cambio(ref) {
	wardrobe.modules[moduleselect]
	pintamodulos();
    Close_popup();

};

