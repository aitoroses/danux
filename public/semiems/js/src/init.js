
//Globales
var App = {};
App.init = {
	rap: "rapisamazing"
};

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

// Object Approach
var App = {};

App.Kinetic = {
	stage: stage,
	stagep: stagep,
	layer: layer,
	layeri: layeri,
	layerp: layerp,
	layerpi: layerpi,
	layerm: layerm,
	alto: "",
	ancho:"",
	anchialtillo: 0.13
	
};

$(function() {

	var lvl = $('#sel_parent');						//selector for the tab menu
	lvl.find('a').live('click', function() {		
		$('a.selector').removeClass('onn')
		$(this).addClass('onn')
		return false;
	});	

});