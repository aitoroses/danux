
//###################################################################  PINTA PUERTAS
function pintapuertas(){
  //Limpiamos las Layers, stage y el container
  layerp=new Kinetic.Layer();
  layerpi=new Kinetic.Layer();
  layertext=new Kinetic.Layer();
  stagep.clear;
  document.getElementById("containerp").innerHTML="";	
  // Obtenemos el Wardrobe
  wardrobe = WardrobeModel.getWardrobe();

  //Dibujamos las puertas
  var nmod = wardrobe.modules.length;

  ancho= wardrobe.data.width*(666.8/4167);
  alto=wardrobe.data.height*(300/2500);
  //definimos la stage
  stagep = new Kinetic.Stage({
    container: 'containerp',
    width: ancho,
    height: alto
  });
  //pintamos el marco si tiene
  pintamarco();
  //cambiamos ancho y alto para dejar ver el marco
  ancho=ancho-20;
  alto=alto-20;
  
  nmod = wardrobe.doors.length;
  //Obtencion previa de la infomacion de las puertas del armario =)
  $.ajax({
    type: "GET",
    url: "content/door/",
    dataType: "json",
    async: false,
    success: function(req){
      data = req
    }
  });

  // desde donde empezamos a pintar en eje X
  var xcont =10;
  for(x=0;x<nmod;x++){ //Bucle por puerta

    var ycont =10;
    var doors = data.types[x];
    xx=0; //Bucle para pintar los materiales tiene que inicializarse a 0
    for(y=0;y<doors.length;y++){ //Bucle para el diseño de la puerta
      (function() {
        var i=y;
        var j=x;
        // Anchura de perfil dependiendo del tipo de perfil
        if (wardrobe.data.tperfil == 2){
          var stroke_per=4
        }else if (wardrobe.data.tperfil == 3){
          var stroke_per=1
        }else {
          var stroke_per=2
        } 
        var puerta = new Kinetic.Rect({
          x: xcont,
          y: ycont,
          width: ancho/wardrobe.doors.length,
          height: alto*doors[i],
          stroke: 'black',
          fill: 'transparent',
          strokeWidth:stroke_per,				
          name: 'p'+j+'m'+i
        });

        //MATERIAL PUERTA
        if(wardrobe.doors[j].material.length != 0){
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
            //var id = wardrobe.doors[j].material[i];
            imageObj.src = data.materials[j][0][xx];
            xx=xx+1;
            /*var srcc = $.ajax({
              type: "GET",
              url: "content/materialsource/"+id,
              async:false,
              success: function(data){
                imageObj.src = data;
              }
            });*/
          }
        }
        ycont = ycont + alto*doors[i];       	

        puerta.on('click', function(evt) {
          var shape = evt.targetNode;
          var aux=shape.getName();

          var idx = materialselect.indexOf(aux); // Find the index
          if(idx!=-1) {
            materialselect.splice(idx, 1);
          }else{
            materialselect.push(aux);
          } // Remove it if really found!
          var shape = evt.targetNode;
          var stroke = this.getStroke();
          canvasMessage.pinta_notifications('add_X',stagep);
          switch (stroke){
            case "red":
              if (colortemp=='black'){
                this.setStroke('orange')
                this.moveToTop();
                stagep.draw();
              }else if (colortemp=='red'){
                this.setStroke('orange')
                this.moveToTop();
                stagep.draw();
              }else{
                this.setStroke('red');
                colortemp ='black';
                this.moveToTop();
                stagep.draw();
              }
              break;
            case "orange":
              if (colortemp=='black'){
                this.setStroke('red')
                this.moveToTop();
                stagep.draw();                
              }
              break;
          }
        });

        puerta.on('mouseout', function(evt) {
          var shape = evt.targetNode;
          var stroke = shape.getStroke();
          switch (stroke){
            case "red":
              this.setStroke(colortemp);
              if (colortemp=='orange'){
                this.moveToTop();                  
              }else{
                this.moveToBottom();
              }
              break;
          }
          stagep.draw();
          layertext.draw();
        });

        puerta.on('mouseover', function(evt) {
          var shape = evt.targetNode;
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
/*  stagep.draw();
  layerpi.draw();
  layerp.draw();
  layertext.draw();*/

  var shapes = stagep.get('.image');
  // each transition to all nodes in the array
  shapes.each('moveToBottom', {});
};	
	
//###################################################################  PINTA MODULOS NUEVA	  
function pintamodulos(){
  //limpiamos las variables
  layer=new Kinetic.Layer();
  layeri=new Kinetic.Layer();
  stage.clear;
  document.getElementById("containeri").innerHTML="";
  //recogemos los datos
  wardrobe = WardrobeModel.getWardrobe();

  var nmod = wardrobe.modules.length;

  ancho= wardrobe.data.width*(666.8/4167);
  alto=wardrobe.data.height*(300/2500);
    stage = new Kinetic.Stage({
    container: 'containeri',
    width: ancho,
    height: alto
  });
  ancho=ancho-20;
  alto=alto-20;
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
  // each transition to all nodes in the array
  shapes.each('moveToBottom', {});
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
        var shape = evt.targetNode;
        var aux=shape.getName();
        moduleselect=aux;
        anchuratemp=shape.attrs.width;

        // Popup

        var tab = getTab();

        double = WardrobeModel.wardrobe.modules[i].double;
        $.ajax({
          type: 'POST',
          url: "API/session/double/" + double,
          async: false,
          success: function() {
            if(tab==3){
              popup.openPopup();
              popup.fetch({name: "agregar_accesorios_interior"});
            }else{
              popup.openPopup();
              popup.fetch({name: "modules"});
            }
          }
        });
      });

      mod.on('mouseout', function(evt) {
        var shape = evt.targetNode;
        var stroke = this.getStroke();
        canvasMessage.destroy_layers();
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
        var shape = evt.targetNode;
        var stroke = this.getStroke();
        canvasMessage.pinta_notifications_accesorios('add_+',stage,shape);
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
      imageObj.src = "semiems/contenido/Bibliotecas/modulos/"+ id +".png";     

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
        imageObj2.src = "semiems/contenido/Bibliotecas/modulos/"+ id +".png";     

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
  wardrobe = WardrobeModel.getWardrobe();
  anchop= wardrobe.data.width*(666.8/4167);
  altop=wardrobe.data.height*(300/2500);
  var borde = new Kinetic.Rect({
    x: 0,
    y: 0,
    width: anchop,
    height: altop,
    stroke: 'black',
    fill: 'transparent',
    strokeWidth:2
  });
  var fond = new Kinetic.Rect({
    x: 10,
    y: 10,
    width: anchop-20,
    height: altop-20,
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
        name:'image2',
        stroke:'black',
        strokeWidth:1
      });
    
    layerm.add(marc);
    layerm.add(borde);
    layerm.add(fond);
    stagep.add(layerm);
    stagep.draw();
    layerm.draw();
    layerm.moveToBottom();
    }
    var id = wardrobe.data.marco;     
    var srcc = $.ajax({
  type: "GET",
      url: "content/materialsource/"+id,
      async: false,
      success: function(data){
        imageObj33.src = data;
      }
    });
  }
};

canvasMessage = new Object({
  message: new Kinetic.Text(),
  layertext: new Kinetic.Layer(),

  initialize: function(){

  },
  destroy_layers: function(){
    this.layertext.destroy();
  },
  pinta_notifications_accesorios: function(type_message,stage,ele){
    this.layertext.destroy();
    this.layertext = new Kinetic.Layer();
    this.createMessage(type_message,ele.getX(),ele.getY(),ele.getWidth(),ele.getHeight())
    this.layertext.draw();
    stage.add(this.layertext);
    this.layertext.moveDown();
    stage.draw();
  },
  pinta_notifications: function(type_message,stage){
    this.layertext.destroy();
    this.layertext = new Kinetic.Layer();
    nmod = wardrobe.doors.length;
    for(x=0;x<materialselect.length;x++){ //Bucle por puerta
      var ele = stage.get('.' + materialselect[x])
      this.createMessage(type_message,ele[0].getX(),ele[0].getY(),ele[0].getWidth(),ele[0].getHeight())
      this.layertext.draw();
    }
    stage.add(this.layertext);
    this.layertext.moveDown();
    stage.draw();
  },
  createMessage: function(type_message,x,y,width,height){
    if(type_message == 'add_+'){
      /*this.message = new Kinetic.Text({
        x: x,
        y: y-y/2,
        text: 'Modulo \n Seleccionado',
        fontSize: 16,
        fontFamily: 'Calibri',
        fill: 'black',
        align: 'center'
      });*/
      anch1 = (8/90)*width;
      anch2 = (14/90)*width;
      offset = 20 - (anch2-anch1)/2;

      hline = new Kinetic.Line({
        points: [x+offset,y+height/2,x+width-offset,y+height/2],
        stroke: "black",
        strokeWidth:anch2 
      }); 
      this.layertext.add(hline);
      vline = new Kinetic.Line({
        points: [x+width/2,y+height/2+width/2-offset,x+width/2,y+height/2-width/2+offset],
        stroke: "black",
        strokeWidth:anch2 
      });
      this.layertext.add(vline);
      hline = new Kinetic.Line({
        points: [x+20,y+height/2,x+width-20,y+height/2],
        stroke: "white",
        strokeWidth:anch1
      }); 
      this.layertext.add(hline);
      vline = new Kinetic.Line({
        points: [x+width/2,y+height/2+width/2-20,x+width/2,y+height/2-width/2+20],
        stroke: "white",
        strokeWidth:anch1  
      });
      this.layertext.add(vline);
    }else if(type_message == 'add_X'){
      hline = new Kinetic.Line({
        points: [x+18,y+height/2+width/2-18,x+width-18,y+height/2-width/2+18],
        stroke: "black",
        strokeWidth:14 
      }); 
      this.layertext.add(hline);
      vline = new Kinetic.Line({
        points: [x+width/2+width/2-18,y+height/2+width/2-18,x+width/2-width/2+18,y+height/2-width/2+18],
        stroke: "black",
        strokeWidth:14 
      });
      this.layertext.add(vline);
      hline1 = new Kinetic.Line({
        points: [x+20,y+height/2+width/2-20,x+width-20,y+height/2-width/2+20],
        stroke: "white",
        strokeWidth:8 
      }); 
      this.layertext.add(hline1);
      vline1 = new Kinetic.Line({
        points: [x+width/2+width/2-20,y+height/2+width/2-20,x+width/2-width/2+20,y+height/2-width/2+20],
        stroke: "white",
        strokeWidth:8  
      });
      this.layertext.add(vline1);
    }
  }
})
