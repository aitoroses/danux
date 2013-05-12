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

  initialize: function(ancho_f,alto_f,container){
    this.alto_f = alto_f;
    this.ancho_f = ancho_f;
   
    
    this.stage = new Kinetic.Stage({
      container: container,
      width: this.ancho_f,
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
    this.background = new Kinetic.Rect({
      x: 0, 
      y: 0, 
      width: this.ancho_f,
      height: this.alto_f,
      fill: "transparent",
      stroke: 'black',
      strokeWidth:1
    });
    this.overLayer.add(this.background);
    this.line = new Kinetic.Line({
      points: [0, 0, 0, 0],
      stroke: "red"
    });
    this.overLayer.add(this.line);

    this.stage.add(this.overLayer);
    /*this.stage.add(this.messageLayer);*/
    this.stage.add(this.indicatorLayer);
  },
  writeMessage: function(messageLayer,message,x,y){
    /*var context = messageLayer.getContext();
    messageLayer.clear();
    context.font = '18pt Calibri';
    context.fillStyle = 'black';
    context.fillText(message, x+15, y);
    console.log(x+15)
    console.log(y)*/
    $("#divinput").css({'top':y,'left':x+15,'position':'relative','width':'10px'}).fadeIn('slow');
    document.getElementById('txt_input').value = message;
  },
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
  onMouseOver: function(){
    var mousePos = this.stage.getMousePosition();
    var x = mousePos.x;
    this.line.getPoints()[0].x = x;
    this.line.getPoints()[0].y = 0;
    this.line.getPoints()[1].x = x;
    this.line.getPoints()[1].y = this.background.getHeight();
    this.overLayer.draw();
    this.write_indication(0,x,this.alto_f+10); 
    this.writeMessage(this.messageLayer, x ,x/2,this.alto_f);
  },
  onMouseOverFixed: function(x){
    x=parseInt(x.value);
    //x=measuresAdjust(x);
    if(x >= 0 && x <= this.ancho_f){
      //x=x+30;
      this.line.getPoints()[0].x = x;
      this.line.getPoints()[0].y = 0;
      this.line.getPoints()[1].x = x;
      this.line.getPoints()[1].y = this.background.getHeight();
      this.overLayer.draw();
      this.write_indication(0,x,this.alto_f+10); 
      this.writeMessage(this.messageLayer, x ,x/2,this.alto_f);
    }
  },
  measuresAdjust: function(x){
    max= this.alto_f*2
    xa = x*this.ancho_f/this.ancho_f_real
    return xa
  }
});



