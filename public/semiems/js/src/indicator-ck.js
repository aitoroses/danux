division=new Object({stage:"",overLayer:"",messageLayer:"",indicatorLayer:"",line:"",hline:"",vline1:"",vline2:"",background:"",alto_f:0,ancho_f:0,borde:0,ancho_f_real:0,initialize:function(e,t,n,r,i){this.ancho_f_real=parseInt(i);this.borde=r;this.alto_f=t;this.ancho_f=e;this.stage=new Kinetic.Stage({container:n,width:this.ancho_f+this.borde*2,height:this.alto_f+50});this.overLayer=new Kinetic.Layer;this.indicatorLayer=new Kinetic.Layer;this.hline=new Kinetic.Line({points:[0,0,0,0],stroke:"black"});this.indicatorLayer.add(this.hline);this.vline1=new Kinetic.Line({points:[0,0,0,0],stroke:"black"});this.indicatorLayer.add(this.vline1);this.vline2=new Kinetic.Line({points:[0,0,0,0],stroke:"black"});this.indicatorLayer.add(this.vline2);this.line=new Kinetic.Line({points:[0,0,0,0],stroke:"red"});this.overLayer.add(this.line);this.background=new Kinetic.Rect({x:30,y:0,width:this.ancho_f,height:this.alto_f,fill:"transparent",stroke:"black",strokeWidth:1});this.overLayer.add(this.background);this.stage.add(this.overLayer);this.stage.add(this.indicatorLayer)},writeMessage:function(e,t,n,r){$("#divinput").css({top:r+87,left:n+270+this.borde,position:"absolute",width:"19px"}).fadeIn("slow");document.getElementById("txt_input").value=t},write_indication:function(e,t,n){this.hline.getPoints()[0].x=e;this.hline.getPoints()[0].y=n;this.hline.getPoints()[1].x=t;this.hline.getPoints()[1].y=n;this.vline1.getPoints()[0].x=e;this.vline1.getPoints()[0].y=n-5;this.vline1.getPoints()[1].x=e;this.vline1.getPoints()[1].y=n+5;this.vline2.getPoints()[0].x=t;this.vline2.getPoints()[0].y=n-5;this.vline2.getPoints()[1].x=t;this.vline2.getPoints()[1].y=n+5;this.indicatorLayer.draw()},onMouseOver:function(){var e=this.stage.getMousePosition(),t=e.x;this.line.getPoints()[0].x=t;this.line.getPoints()[0].y=0;this.line.getPoints()[1].x=t;this.line.getPoints()[1].y=this.background.getHeight();this.overLayer.draw();this.write_indication(this.borde,t,this.alto_f+10);this.writeMessage(this.messageLayer,this.measuresAdjust(t-this.borde),(t-this.borde)/2,this.alto_f)},onMouseOverFixed:function(e){message=parseInt(e.value);e=parseInt(e.value);if(e>=0&&e<=this.ancho_f_real){e=this.measuresAdjustR(e);e+=this.borde;this.line.getPoints()[0].x=e;this.line.getPoints()[0].y=0;this.line.getPoints()[1].x=e;this.line.getPoints()[1].y=this.background.getHeight();this.overLayer.draw();this.write_indication(this.borde,e,this.alto_f+10);this.writeMessage(this.messageLayer,message,(e-this.borde)/2,this.alto_f)}},measuresAdjust:function(e){xa=e*this.ancho_f_real/this.ancho_f;return parseInt(xa)},measuresAdjustR:function(e){xa=e*this.ancho_f/this.ancho_f_real;return parseInt(xa)}});