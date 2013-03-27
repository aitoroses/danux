
//Globales
var client = {
				  				"company":	"danibram",
								"nif" :	"44614506a"
			};

var wardrobe = 0;
var nuevo=1;
var puertas_aux="sel";
var modulos_aux="div";	
var pselect=0;

var moduleselect = 0;
var puertaselect = 0;

var materialselect=[];
var colortemp="";
var anchuratemp=0;

var	stage ="";
var	stagep ="";
var	layer = new Kinetic.Layer();
var	layeri = new Kinetic.Layer();
var	layerp = new Kinetic.Layer();
var	layerpi = new Kinetic.Layer();
var	layerm = new Kinetic.Layer();

var alto="";
var ancho="";
var anchoaltillo=0.13;


$(function() {
//var $tabs = $('#tabs').tabs();	
//$('#tabs').tabs({ event: '' }); //probably better
  /*$('#tabs').bind('tabsshow', function(event, ui) {
    window.location.hash = '#' + ui.panel.id;
  });
	$('.next-tab, .prev-tab').click(function() { 

		if($(this).attr("rel")==4 && document.frm.puerta.value == 2){
			$tabs.tabs('select', 5);
		}else if($(this).attr("rel")==5 && document.frm.puerta.value == 2){
			$tabs.tabs('select', 2);
		}else{
			$tabs.tabs('select', $(this).attr("rel"));
		}
		ini();
		return false;
	});*/


	var lvl = $('#sel_parent');						//selector for the tab menu
	lvl.find('a').live('click', function() {		
		$('a.selector').removeClass('onn')
		$(this).addClass('onn')
		return false;
	});	

	$(".item img").live("click", function() {
	
		var ref = $(this).attr('ref');
		var auxitem=moduleselect.substring(1,2)
		
		if (moduleselect.substring(3,4)==1){
			WardrobeModel.getWardrobe().modules[auxitem].ref1=ref
		
		}else if (moduleselect.substring(3,4)==2){
			WardrobeModel.getWardrobe().modules[auxitem].ref2=ref
			}
		pintamodulos();
		popup.closePopup();	
		
	});
		$(".item2 img").live("click", function() {
		

		var ref = $(this).attr('ref');
		var div = $(this).attr('div');
		$.each(materialselect, function(i, selection){

			var auxitem=selection.substring(1,2);
			wardrobe.doors[auxitem].type=ref;
			var strout_div=[];
			for (var iiii=0;iiii<div;iiii++)
			{ 
				strout_div.push(0);
			}
			wardrobe.doors[auxitem].material=strout_div;

		})
		materialselect=[];
		var ref = $(this).attr('ref');
		var auxitem=puertaselect.substring(1,2);
		wardrobe.doors[auxitem].type=ref;
		var div = $(this).attr('div');
		var strout_div=[];
		for (var iiii=0;iiii<div;iiii++)
		{ 
			strout_div.push(0);
		}
		wardrobe.doors[auxitem].material=strout_div;		
		pintapuertas();
		popup.closePopup();	
	});
		$(".item3 img").live("click", function() {
		
		var ref = $(this).attr('ref');
		$.each(materialselect, function(i, selection){

			var auxitem=selection.substring(1,2);
			var auxitem2=selection.substring(3,4);
			wardrobe.doors[auxitem].material[auxitem2]=ref;

		})
		materialselect=[];
		
		/*var ref = $(this).attr('ref');
		var auxitem=puertaselect.substring(1,2);
		var auxitem2=puertaselect.substring(3,4);
		wardrobe.doors[auxitem].material[auxitem2]=ref;*/
		
		pintapuertas();
		acabado_perfil();
		popup.closePopup();	
	});
		$(".item4 img").live("click", function() {		
		var ref = $(this).attr('ref');
		wardrobe.data.marco=parseInt(ref);
		$('#mat_marc').html(''); 
		pintapuertas();
		cambio_marco();
		popup.closePopup();	
	});
		$(".item5 img").live("click", function() {		
		var ref = $(this).attr('ref');
		wardrobe.data.handle=parseInt(ref);
		//$('#mat_marc').html(''); 
		//pintapuertas();
		cambio_tirador();
		popup.closePopup();	
	});
		$(".accint img").live("click", function() {		
		var ref = parseInt($(this).attr('ref'));

		var idx = wardrobe.accint.indexOf(ref); // Find the index
            if(idx!=-1) {
            }else{
              wardrobe.accint.push(ref);
            }
        AgregarAccInt();
		popup.closePopup();	
	});

});