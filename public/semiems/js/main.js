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
                $(document).trigger('sync_popup');
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

