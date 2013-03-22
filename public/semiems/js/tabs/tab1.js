//Documente ready
$(document).ready(function(){
	$('a.next-tab').on('click',function(e){
		//e.preventDefault();
		ini();
	});

});

//Funciones AUXILIARES

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