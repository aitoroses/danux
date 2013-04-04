//Documente ready
$(document).ready(function(){
	// Obtener el objeto
	$(document).bind('sync',function(){
		pintamodulos();
	});
	$(document).bind('error',function(){
		$('#containeri').html('No se ha cargado el armario');
	});

	WardrobeModel.fetch();


	$('a.next-tab').on('click',function(e){
		e.preventDefault();
		WardrobeModel.save();
		$(document).bind('next', function(){
			location.href = "4";
		})


	});
	$('a.prev-tab').on('click',function(e){	
		

	});

	$(".accint img").live("click", function() {		
		var ref = parseInt($(this).attr('ref'));
		var auxitem=moduleselect.substring(1,2);
		var idx = wardrobe.modules[auxitem].accint.indexOf(ref); // Find the index
            if(idx!=-1) {
            }else{
              wardrobe.modules[auxitem].accint.push(ref);
            }
        
        Pintar_AccInt();
		Close_popup();
	});

});

//Funciones AUXILIARES
var delRow = function (indice){ // Borra el accesorio en el Pop Up
// Funcion que destruye el elemento actual una vez echo el click
$("#rut" + indice).remove ();

  var idx = wardrobe.modules[moduleselect].accint.indexOf(indice); // Find the index
            if(idx!=-1) {
              wardrobe.modules[moduleselect].accint.splice(idx, 1);
            }
 }

var Pintar_AccInt = function(){



}

function AgregarAccInt(modselect){
$("#accint").innerHTML=""
$.each(wardrobe.modules[modselect].accint, function(i, accs){
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

Tab3Controller = {
	modselect: null,

	initialize: function(){
	},
	pintarAccs: function(){
		$.ajax({
       		type: 'GET',  
            url: '',
            success: function(data) {  
                $("#accints").append(data)
            }  
        })			
	},
	borrarAcc: function(){

	}

}
