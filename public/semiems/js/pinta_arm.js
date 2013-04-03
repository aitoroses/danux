//###################################################################  PINTA PUERTAS
function pintapuertas(){

layerp=new Kinetic.Layer();
layerpi=new Kinetic.Layer();

stagep.clear;
document.getElementById("containerp").innerHTML="";	
	
//Dibujamos las puertas
var nmod = wardrobe.modules.length;

ancho= wardrobe.data.width*(666.8/4167);
alto=wardrobe.data.height*(300/2500);
	stagep = new Kinetic.Stage({
          container: 'containerp',
          width: ancho,
          height: alto
        });
pintamarco();//################################################################ MARCO !!!
ancho=ancho-10;
alto=alto-10;

var xcont =5;

nmod = wardrobe.doors.length;
	
for(x=0;x<nmod;x++){ //Bucle por puerta
	
	var ycont =5;
	
		  var id = wardrobe.doors[x].type;
      var doors = 0;     
		  $.ajax({
           		type: "GET",
                url: "php/getRefDoor.php?id="+id,
				dataType: "json",
                async: false,
                success: function(data){

                      doors = data;
                    }
            	});
         
     for(y=0;y<doors.length;y++){ //Bucle para el diseño de la puerta
     	
     	
           (function() {
           	var i=y;
           	var j=x;
            
	        var puerta = new Kinetic.Rect({
              x: xcont,
            	y: ycont,
            	width: ancho/wardrobe.doors.length,
            	height: alto*doors[i],
            	stroke: 'black',
            	fill: 'transparent',
            	strokeWidth:3,				
          		name: 'p'+j+'m'+i
        	});
 
 			//MATERIAL PUERTA
      if(wardrobe.doors[j].material.length !== 0){

  			if (parseInt(wardrobe.doors[j].material[i])!=0){ //ref1
  				
  		    var iix=xcont;
          var iiy=ycont;
          var heighttemp=alto*doors[i];
          var imageObj = new Image();
          imageObj.onload = function() {
  	        var mdoor = new Kinetic.Image({
  	            x: iix,
            		y: iiy,
                width: ancho/wardrobe.doors.length,
                height: heighttemp,
  	            image: imageObj,
            		name:'image'+i
  	        }); 
    				layerpi.add(mdoor);
    				layerpi.draw();
          }
  		    var id = wardrobe.doors[j].material[i];
  		       
  		    var srcc = $.ajax({
         		type: "POST",
              url: "php/getMatDoor_pintar.php",
          	data: {
  				    "id" : id
  	        }, 

            async: false,
            success: function(data){
                  imageObj.src = data;
            }
          });
        }
      }
ycont = ycont + alto*doors[i];       	
							
 	        puerta.on('click', function(evt) {

            var shape = evt.shape;
            var aux=shape.getName();
            var idx = materialselect.indexOf(aux); // Find the index
            if(idx!=-1) {
              materialselect.splice(idx, 1);
            }else{
              materialselect.push(aux);
            } // Remove it if really found!
            

            var shape = evt.shape;
            var stroke = this.getStroke();
            switch (stroke){
              case "red":
                if (colortemp=='black'){
                  this.setStroke('orange')
                  this.moveToTop();                  
                }else{
                  this.setStroke('red')
                  colortemp ='black';
                  this.moveToBottom();
                }
              break;
              case "orange":
                  this.setStroke('red')
                  colortemp ='black';
                  this.moveToTop();
              break;
              
              }
            
            stagep.draw();


		          // get the shape that was clicked on
		          /*if(puertas_aux=='sel'){
		          	puertaselect=aux;
		          	pop_up('psel');		
		          		          
		          }else if(puertas_aux=='div'){

		          	puertaselect=aux;
		            pselect=aux.substring(1,2);
		          	pop_up('pdiv');	

		          }*/
		    });
		    
		   puerta.on('mouseout', function(evt) {
		    	var shape = evt.shape;
        	var stroke = this.getStroke();
        		switch (stroke){
        			case "red":
        			this.setStroke(colortemp);
              this.moveToBottom();

                if (colortemp=='orange'){
                  this.moveToTop();                  
                }else{
                  this.moveToBottom();
                }

        			break;
        			}
         	stagep.draw();
      		});

      	puerta.on('mouseover', function(evt) {
		    	var shape = evt.shape;
        	var stroke = this.getStroke();
          colortemp= stroke;
        	this.setStroke('red');
          this.moveToTop();
        	stagep.draw();
      		});
		    	
	        layerp.add(puerta);


          })();    	
     	
     	    
     }    //FINDE FOR Diseño puerta	
          
xcont = xcont + ancho/wardrobe.doors.length;
}//Finde FOR puerta


		stagep.add(layerpi);
		stagep.add(layerp);
		stagep.draw();
		layerpi.draw();
		layerp.draw();

		var shapes = stagep.get('.image');
        // apply transition to all nodes in the array
        shapes.apply('moveToBottom', {});
			
};	
	
//###################################################################  PINTA MODULOS NUEVA	  
function pintamodulos(){
layer=new Kinetic.Layer();
layeri=new Kinetic.Layer();

stage.clear;
document.getElementById("containeri").innerHTML="";

wardrobe = WardrobeModel.getWardrobe();
	
var nmod = wardrobe.modules.length;

ancho= wardrobe.data.width*(666.8/4167);
alto=wardrobe.data.height*(300/2500);
	stage = new Kinetic.Stage({
          container: 'containeri',
          width: ancho,
          height: alto
        });
ancho=ancho-10;
alto=alto-10;
		

//Dibujamos el interior		
for(x=0;x<nmod;x++){

var xcont=5;
for(zz=0;zz<x;zz++){
xcont = xcont + wardrobe.modules[zz].width*(ancho/wardrobe.data.width);   
}

		
        	(function() { //Intocable
            var i = x;
            
	        var mod = new Kinetic.Rect({
              x: xcont,
            	y: 5,
            	width: wardrobe.modules[i].width*(ancho/wardrobe.data.width),
            	height: alto*anchoaltillo,
            	stroke: 'black',
            	fill: 'white',
            	strokeWidth:3,				
          		name: 'm'+i+'d'+0
        	});
	
	        layer.add(mod);
			})();

		pintamoduloNormal(x,parseInt(wardrobe.modules[x].double),xcont);
}		
		stage.add(layeri);
		stage.add(layer);
		stage.draw();
		layeri.draw();
		layer.draw();

		var shapes = stage.get('.image');
        // apply transition to all nodes in the array
        shapes.apply('moveToBottom', {});

	};
	
//
// x= Modulo; y=Si es doble; z=Distacia a la que empieza el modulo;
//	
function pintamoduloNormal(x,y,z){


var xcontaux=z;

var ix1=0;
var ix2=0;
var iy1=0;
var iy2=0;


if (y==1){ 
	var yaux = wardrobe.modules[x].ddouble*(ancho/wardrobe.data.width);
	var dbl=2; 
}else{
	var yaux = wardrobe.modules[x].width*(ancho/wardrobe.data.width);	
	var dbl=1;
}

for (z=0;z<dbl;z++){	

	(function() {
            var i = x;
            var j = z+1;
            
       		var mod = new Kinetic.Rect({
              	x: xcontaux,
            	y: 5+(alto*anchoaltillo),
            	width: yaux,
            	height: alto-(alto*anchoaltillo),
            	stroke: 'black',
            	fill: 'transparent',
            	strokeWidth:3,				
          		name: 'm'+i+'d'+j,
        	});		 
        	                  	
		
 	        mod.on('click', function(evt) {

              var shape = evt.shape;
              var aux=shape.getName();
              moduleselect=aux;
              anchuratemp=shape.attrs.width;

              // Popup
              
              var tab = getTab();
              
              double = WardrobeModel.wardrobe.modules[i].double;
              $.ajax({
                type: 'POST',
                url: "API/session/double/" + double,
                success: function() {
                  if(tab==3){
                  popup.fetch({name: "accesorios_modulo"});
                  }else{
                    popup.fetch({name: "modules"});
                  }
                }
              });

              

		          // get the shape that was clicked on
		          /*		          
		          if(modulos_aux=='sel'){
		          	var shape = evt.shape;
		          	var aux=shape.getName();
		          	moduleselect=aux;
		          	pop_up('isel');			          
		          	//var src = cargaimg();
		          	
		          }else if(modulos_aux=='div'){
		          	var shape = evt.shape;
		          	var aux=shape.getName();
		          	moduleselect=aux.substring(1,2);			          			          
		          	pop_up('idiv',shape.attrs.width);
		          }*/
		    });
		    mod.on('mouseout', function(evt) {
		    	var shape = evt.shape;
        		var stroke = this.getStroke();
        		switch (stroke){
        			case "black":
        			this.setStroke('orange')
        			break;
        			case "orange":
        			this.setStroke('black')
        			break;
        			
        			
        			}
 				this.moveToTop();
         		stage.draw();
      		});
      		mod.on('mouseover', function(evt) {
		    	var shape = evt.shape;
        		var stroke = this.getStroke();
        		switch (stroke){
        			case "black":
        			this.setStroke('orange')
        			break;
        			case "orange":
        			this.setStroke('black')
        			break;
        			
        			
        			}
        		this.moveToTop();
        		stage.draw();
      		});
	        layer.add(mod);
	        
	     //################################################ Si referencias   
	  if (z==0 && parseInt(wardrobe.modules[i].ref1)!=0){ //ref1
		        ix1=xcontaux;
		        iy1=yaux;
		        var imageObj = new Image();
		        imageObj.onload = function() {
		        var arm = new Kinetic.Image({
		            x: ix1,
	            	y: 5+(alto*anchoaltillo),
		            image: imageObj,
		            width: iy1,
            		height: alto-(alto*anchoaltillo),
            		name:'image'
		          });

                 
				layeri.add(arm);
				layeri.draw();

		        }
		  var id = wardrobe.modules[i].ref1;     
		  var srcc = $.ajax({
           		type: "GET",
                url: "content/module/"+id,

                async: false,
                success: function(data){
                      imageObj.src = data;
                    }
            	});

			

        }else if (z==1 && parseInt(wardrobe.modules[i].ref2)!=0){   //ref2
        		ix2=xcontaux;
		        iy2=yaux;
		        var imageObj2 = new Image();
		        imageObj2.onload = function() {
		        var arm2 = new Kinetic.Image({
		            x: ix2,
	            	y: 5+(alto*anchoaltillo),
		            image: imageObj2,
		            width: iy2,
            		height: alto-(alto*anchoaltillo),
            		name:'image2'
		          });

				layeri.add(arm2);
				layeri.draw();

	        }
		  var id = wardrobe.modules[i].ref2;     
		  var srcc = $.ajax({
           		type: "GET",
                url: "content/module/"+id,

                async: false,
                success: function(data){
				              imageObj2.src = data;
                    }
            	});

			
        	
        }
        	
		if (y==1){ 
			yaux = (wardrobe.modules[i].width-wardrobe.modules[i].ddouble)*(ancho/wardrobe.data.width);
			xcontaux= xcontaux + ((wardrobe.modules[i].ddouble)*(ancho/wardrobe.data.width));
		}	
	        
	      //······ Adios funcion anonima  
          })();
}          
};

//###################################################################  PINTA MARCO 
function pintamarco(){
layerm=new Kinetic.Layer();

anchop= wardrobe.data.width*(666.8/4167);
altop=wardrobe.data.height*(300/2500);

var fond = new Kinetic.Rect({
  x: 5,
  y: 5,
  width: anchop-10,
  height: altop-10,
  stroke: 'black',
  fill: 'white',
  strokeWidth:0
});

if (wardrobe.data.marco != 0){
  var imageObj33 = new Image();
  imageObj33.onload = function() {
  var marc = new Kinetic.Image({
      x: 0,
      y: 0,
      image: imageObj33,
      width: anchop,
      height: altop,
      name:'image2'
    });

  layerm.add(marc);
  layerm.add(fond);
  stagep.add(layerm);
  stagep.draw();
  layerm.draw();
  layerm.moveToBottom();

  }
  var id = wardrobe.data.marco;     
  var srcc = $.ajax({
    type: "POST",
    url: "php/getMatDoor_pintar.php",
    data: {
      "id" : id
    }, 
    async: false,
    success: function(data){
      imageObj33.src = data;
    }
  });
}



         
};
