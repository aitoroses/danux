//###################################################################  PINTA PUERTAS
function pintapuertas(){layerp=new Kinetic.Layer;layerpi=new Kinetic.Layer;stagep.clear;document.getElementById("containerp").innerHTML="";var e=wardrobe.modules.length;ancho=wardrobe.data.width*(666.8/4167);alto=wardrobe.data.height*.12;stagep=new Kinetic.Stage({container:"containerp",width:ancho,height:alto});pintamarco();ancho-=10;alto-=10;var t=5;e=wardrobe.doors.length;for(x=0;x<e;x++){var n=5,r=wardrobe.doors[x].type,i=0;$.ajax({type:"GET",url:"php/getRefDoor.php?id="+r,dataType:"json",async:!1,success:function(e){i=e}});for(y=0;y<i.length;y++)(function(){var e=y,r=x,s=new Kinetic.Rect({x:t,y:n,width:ancho/wardrobe.doors.length,height:alto*i[e],stroke:"black",fill:"transparent",strokeWidth:3,name:"p"+r+"m"+e});if(wardrobe.doors[r].material.length!==0&&parseInt(wardrobe.doors[r].material[e])!=0){var o=t,u=n,a=alto*i[e],f=new Image;f.onload=function(){var t=new Kinetic.Image({x:o,y:u,width:ancho/wardrobe.doors.length,height:a,image:f,name:"image"+e});layerpi.add(t);layerpi.draw()};var l=wardrobe.doors[r].material[e],c=$.ajax({type:"POST",url:"php/getMatDoor_pintar.php",data:{id:l},async:!1,success:function(e){f.src=e}})}n+=alto*i[e];s.on("click",function(e){var t=e.shape,n=t.getName(),r=materialselect.indexOf(n);r!=-1?materialselect.splice(r,1):materialselect.push(n);var t=e.shape,i=this.getStroke();switch(i){case"red":if(colortemp=="black"){this.setStroke("orange");this.moveToTop()}else{this.setStroke("red");colortemp="black";this.moveToBottom()}break;case"orange":this.setStroke("red");colortemp="black";this.moveToTop()}stagep.draw()});s.on("mouseout",function(e){var t=e.shape,n=this.getStroke();switch(n){case"red":this.setStroke(colortemp);this.moveToBottom();colortemp=="orange"?this.moveToTop():this.moveToBottom()}stagep.draw()});s.on("mouseover",function(e){var t=e.shape,n=this.getStroke();colortemp=n;this.setStroke("red");this.moveToTop();stagep.draw()});layerp.add(s)})();t+=ancho/wardrobe.doors.length}stagep.add(layerpi);stagep.add(layerp);stagep.draw();layerpi.draw();layerp.draw();var s=stagep.get(".image");s.apply("moveToBottom",{})}function pintamodulos(){layer=new Kinetic.Layer;layeri=new Kinetic.Layer;stage.clear;document.getElementById("containeri").innerHTML="";wardrobe=WardrobeModel.getWardrobe();var e=wardrobe.modules.length;ancho=wardrobe.data.width*(666.8/4167);alto=wardrobe.data.height*.12;stage=new Kinetic.Stage({container:"containeri",width:ancho,height:alto});ancho-=10;alto-=10;for(x=0;x<e;x++){var t=5;for(zz=0;zz<x;zz++)t+=wardrobe.modules[zz].width*(ancho/wardrobe.data.width);(function(){var e=x,n=new Kinetic.Rect({x:t,y:5,width:wardrobe.modules[e].width*(ancho/wardrobe.data.width),height:alto*anchoaltillo,stroke:"black",fill:"white",strokeWidth:3,name:"m"+e+"d"+0});layer.add(n)})();pintamoduloNormal(x,parseInt(wardrobe.modules[x].double),t)}stage.add(layeri);stage.add(layer);stage.draw();layeri.draw();layer.draw();var n=stage.get(".image");n.apply("moveToBottom",{})}function pintamoduloNormal(e,t,n){var r=n,i=0,s=0,o=0,u=0;if(t==1)var a=wardrobe.modules[e].ddouble*(ancho/wardrobe.data.width),f=2;else var a=wardrobe.modules[e].width*(ancho/wardrobe.data.width),f=1;for(n=0;n<f;n++)(function(){var f=e,l=n+1,c=new Kinetic.Rect({x:r,y:5+alto*anchoaltillo,width:a,height:alto-alto*anchoaltillo,stroke:"black",fill:"transparent",strokeWidth:3,name:"m"+f+"d"+l});c.on("click",function(e){var t=e.shape,n=t.getName();moduleselect=n;anchuratemp=t.attrs.width;var r=getTab();double=WardrobeModel.wardrobe.modules[f].double;$.ajax({type:"POST",url:"API/session/double/"+double,success:function(){r==3?popup.fetch({name:"agregar_accesorios_interior"}):popup.fetch({name:"modules"})}})});c.on("mouseout",function(e){var t=e.shape,n=this.getStroke();switch(n){case"black":this.setStroke("orange");break;case"orange":this.setStroke("black")}this.moveToTop();stage.draw()});c.on("mouseover",function(e){var t=e.shape,n=this.getStroke();switch(n){case"black":this.setStroke("orange");break;case"orange":this.setStroke("black")}this.moveToTop();stage.draw()});layer.add(c);if(n==0&&parseInt(wardrobe.modules[f].ref1)!=0){i=r;o=a;var h=new Image;h.onload=function(){var e=new Kinetic.Image({x:i,y:5+alto*anchoaltillo,image:h,width:o,height:alto-alto*anchoaltillo,name:"image"});layeri.add(e);layeri.draw()};var p=wardrobe.modules[f].ref1,d=$.ajax({type:"GET",url:"content/module/"+p,async:!1,success:function(e){h.src=e}})}else if(n==1&&parseInt(wardrobe.modules[f].ref2)!=0){s=r;u=a;var v=new Image;v.onload=function(){var e=new Kinetic.Image({x:s,y:5+alto*anchoaltillo,image:v,width:u,height:alto-alto*anchoaltillo,name:"image2"});layeri.add(e);layeri.draw()};var p=wardrobe.modules[f].ref2,d=$.ajax({type:"GET",url:"content/module/"+p,async:!1,success:function(e){v.src=e}})}if(t==1){a=(wardrobe.modules[f].width-wardrobe.modules[f].ddouble)*(ancho/wardrobe.data.width);r+=wardrobe.modules[f].ddouble*(ancho/wardrobe.data.width)}})()}function pintamarco(){layerm=new Kinetic.Layer;anchop=wardrobe.data.width*(666.8/4167);altop=wardrobe.data.height*.12;var e=new Kinetic.Rect({x:5,y:5,width:anchop-10,height:altop-10,stroke:"black",fill:"white",strokeWidth:0});if(wardrobe.data.marco!=0){var t=new Image;t.onload=function(){var n=new Kinetic.Image({x:0,y:0,image:t,width:anchop,height:altop,name:"image2"});layerm.add(n);layerm.add(e);stagep.add(layerm);stagep.draw();layerm.draw();layerm.moveToBottom()};var n=wardrobe.data.marco,r=$.ajax({type:"POST",url:"php/getMatDoor_pintar.php",data:{id:n},async:!1,success:function(e){t.src=e}})}};