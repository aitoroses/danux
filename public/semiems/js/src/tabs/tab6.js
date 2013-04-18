//Documente ready 
$(document).ready(function(){
  // Eventos
  $(document).bind('sync',function(){
    Tab6Controller.pintarMarco();
    Tab6Controller.KineticPintaPuertaMarco();
  });
  $(document).bind('sync_popup',function(){
    
  });
  $(document).bind('sync_save',function(){
    Tab6Controller.pintarMarco();
    Tab6Controller.KineticPintaPuertaMarco();
  });
  $(document).bind('error',function(){
    $('#containeri').html('No se ha cargado el armario');
  });

  $('a.next-tab').on('click',function(e){
    e.preventDefault();
    App.Navigator.goNext();
  });
  $('a.prev-tab').on('click',function(e){ 
    App.Navigator.goBack();
  });
//Ejecucion al iniciar la tab
WardrobeModel.fetch();

});

Tab6Controller = {

  initialize: function(){
  },
  pintarMarco: function(){
    //Borro y pongo espacio para que que 
    // hay debajo del div no se mueva y 
    // provoque errores visuales
    $("#marco_sel").html("&nbsp"); 
    $.ajax({
          type: 'GET',  
            url: 'API/asides/getMarco',
            success: function(data) {  
                $("#marco_sel").append(data)
            }  
        })      
  },
  añadirMarco: function(id){
    WardrobeModel.wardrobe.data.marco=id;
    WardrobeModel.save();
  },
  getMarcoMaterials: function(type){
    $.ajax({
      type: 'GET',
      url: 'API/popup/view/materialsView',
      data: {type: type},
      success: function(response){
        $('#materiales').html(response);
        $('#materiales .element').click(function(){
          // Comportamiento del click
          var id = $(this).data('id')
          Tab6Controller.añadirMarco(id);
          popup.closePopup();
        });
      }
    });
  },
  KineticPintaPuertaMarco: function(){
    //Limpiamos las Layers, stage y el container
    layerp=new Kinetic.Layer();
    layerpi=new Kinetic.Layer();
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
    ancho=ancho-10;
    alto=alto-10;
    // desde donde empezamos a pintar en eje X
    var xcont =5;
    nmod = wardrobe.doors.length;
    for(x=0;x<nmod;x++){ //Bucle por puerta

      var ycont =5;

      var id = wardrobe.doors[x].type;
      var doors = 0;     
      $.ajax({
        type: "GET",
        url: "content/door/"+id,
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
          // Anchura de perfil dependiendo del tipo de perfil
          if (wardrobe.data.tperfil == 1){
            var stroke_per=1
          }else if (wardrobe.data.tperfil == 3){
            var stroke_per=0
          }else {
            var stroke_per=3
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
                type: "GET",
                url: "content/materialsource/"+id,
                async:false,
                success: function(data){
                  imageObj.src = data;
                }
              });
            }
          }
          ycont = ycont + alto*doors[i];        
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
  }
}