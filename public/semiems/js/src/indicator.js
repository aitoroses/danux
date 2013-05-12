division = new Object({
  stage: "",
  overLayer: "",
  messageLayer: "",
  indicatorLayer: "",
  line:"",
  hline:"",
  vline1:"",
  vline2:"",
  background:"",
  alto_f: 0,
  ancho_f: 0,
  borde:0,
  ancho_f_real:0,
  /*
  * Inicializa las variables y crea los canvas etc...
  *  ancho_f ancho del canvas
  *  alto_f alto del canvas
  *  container contenedor sobre el que dibujar
  *  borde borde que dejas a los lados (dentro del canvas)
  *  medida_real medida real del modulo para hacer las conversiones
  */
  initialize: function(ancho_f,alto_f,container,borde,medida_real){
    this.ancho_f_real= parseInt(medida_real); //asi hacemos la conversion
    this.borde = borde;
    this.alto_f = alto_f;
    this.ancho_f = ancho_f;

    this.stage = new Kinetic.Stage({
      container: container,
      width: this.ancho_f + this.borde*2,
      height: this.alto_f + 50
    });
    this.overLayer = new Kinetic.Layer();
    /*this.messageLayer = new Kinetic.Layer();*/
    this.indicatorLayer = new Kinetic.Layer();

    this.hline = new Kinetic.Line({
      points: [0, 0, 0, 0],
      stroke: "black"
    });
    this.indicatorLayer.add(this.hline);
    this.vline1 = new Kinetic.Line({
      points: [0, 0, 0, 0],
      stroke: "black"
    });
    this.indicatorLayer.add(this.vline1);
    this.vline2 = new Kinetic.Line({
      points: [0, 0, 0, 0],
      stroke: "black"
    });
    this.indicatorLayer.add(this.vline2);
    //

    this.line = new Kinetic.Line({
      points: [0, 0, 0, 0],
      stroke: "red"
    });
    this.overLayer.add(this.line);
    this.background = new Kinetic.Rect({
      x: 30, 
      y: 0, 
      width: this.ancho_f,
      height: this.alto_f,
      fill: "transparent",
      stroke: 'black',
      strokeWidth:1
    });
    this.overLayer.add(this.background);
    this.stage.add(this.overLayer);
    /*this.stage.add(this.messageLayer);*/
    this.stage.add(this.indicatorLayer);
  },
  //Pinta el input en la posicion solicitada
  writeMessage: function(messageLayer,message,x,y){
    /*var context = messageLayer.getContext();
    messageLayer.clear();
    context.font = '18pt Calibri';
    context.fillStyle = 'black';
    context.fillText(message, x+15, y);
    console.log(x+15)
    console.log(y)*/
    $("#divinput").css({'bottom':y - 195,'left':x - 15 +this.borde,'position':'relative','width':'19px'}).fadeIn('slow');
    document.getElementById('txt_input').value = message;
  },
  //dibuja el indicador o lo actualiza (3 lineas)
  write_indication: function(x0,x1,y){
    
    this.hline.getPoints()[0].x = x0;
    this.hline.getPoints()[0].y = y;
    this.hline.getPoints()[1].x = x1;
    this.hline.getPoints()[1].y = y;  

    this.vline1.getPoints()[0].x = x0;
    this.vline1.getPoints()[0].y = y-5;
    this.vline1.getPoints()[1].x = x0;
    this.vline1.getPoints()[1].y = y+5;

    this.vline2.getPoints()[0].x = x1;
    this.vline2.getPoints()[0].y = y-5;
    this.vline2.getPoints()[1].x = x1;
    this.vline2.getPoints()[1].y = y+5;
    this.indicatorLayer.draw();
  },
  //Esta funcion es llamada a traves del raton 
  onMouseOver: function(){
    var mousePos = this.stage.getMousePosition();
    var x = mousePos.x;
   
    this.line.getPoints()[0].x = x;
    this.line.getPoints()[0].y = 0;
    this.line.getPoints()[1].x = x;
    this.line.getPoints()[1].y = this.background.getHeight();
    this.overLayer.draw();
    this.write_indication(this.borde,x,this.alto_f+10);
    this.writeMessage(this.messageLayer, this.measuresAdjust(x-this.borde) ,(x-this.borde)/2,this.alto_f);
  },
  //Esta funcion es llamada a traves de un input al que se le pasa la medida
  onMouseOverFixed: function(x){
    message = parseInt(x.value);
    x=parseInt(x.value);
    if(x >= 0 && x <= this.ancho_f_real){
      //x=x+this.borde;
      x=this.measuresAdjustR(x)
      x=x+this.borde;
      this.line.getPoints()[0].x = x;
      this.line.getPoints()[0].y = 0;
      this.line.getPoints()[1].x = x;
      this.line.getPoints()[1].y = this.background.getHeight();
      this.overLayer.draw();
      this.write_indication(this.borde,x,this.alto_f+10); 
      this.writeMessage(this.messageLayer, message ,(x-this.borde)/2,this.alto_f);
   }
  },
  //convierte del ancho relativo al real
  measuresAdjust: function(x){
      xa = x*this.ancho_f_real/this.ancho_f;
      return parseInt(xa)
  },
  //convierte del ancho real al relativo
  measuresAdjustR: function(x){
      xa = x*this.ancho_f/this.ancho_f_real;
      return parseInt(xa)
  }
});



