//Documente ready 
$(document).ready(function(){$(document).bind("sync",function(){Tab6Controller.pintarMarco();Tab6Controller.KineticPintaPuertaMarco()});$(document).bind("sync_popup",function(){});$(document).bind("sync_save",function(){Tab6Controller.pintarMarco();Tab6Controller.KineticPintaPuertaMarco()});$(document).bind("error",function(){$("#containeri").html("No se ha cargado el armario")});$("a.next-tab").on("click",function(e){e.preventDefault()});$("a.prev-tab").on("click",function(e){});WardrobeModel.fetch()});Tab6Controller={initialize:function(){},pintarMarco:function(){$("#marco_sel").html("&nbsp");$.ajax({type:"GET",url:"API/asides/getMarco",success:function(e){$("#marco_sel").append(e)}})},"añadirMarco":function(e){WardrobeModel.wardrobe.data.marco=e;WardrobeModel.save()},getMarcoMaterials:function(e){$.ajax({type:"GET",url:"API/popup/view",data:{type:e},success:function(e){$("#materiales").html(e);$("#materiales .element").click(function(){var e=$(this).data("id");Tab6Controller.añadirMarco(e);popup.closePopup()})}})},KineticPintaPuertaMarco:function(){layerp=new Kinetic.Layer;layerpi=new Kinetic.Layer;stagep.clear;document.getElementById("containerp").innerHTML="";wardrobe=WardrobeModel.getWardrobe();var e=wardrobe.modules.length;ancho=wardrobe.data.width*(666.8/4167);alto=wardrobe.data.height*.12;stagep=new Kinetic.Stage({container:"containerp",width:ancho,height:alto});pintamarco();ancho-=10;alto-=10;var t=5;e=wardrobe.doors.length;for(x=0;x<e;x++){var n=5,r=wardrobe.doors[x].type,i=0;$.ajax({type:"GET",url:"content/door/"+r,dataType:"json",async:!1,success:function(e){i=e}});for(y=0;y<i.length;y++)(function(){var e=y,r=x;if(wardrobe.data.tperfil==1)var s=1;else if(wardrobe.data.tperfil==3)var s=0;else var s=3;var o=new Kinetic.Rect({x:t,y:n,width:ancho/wardrobe.doors.length,height:alto*i[e],stroke:"black",fill:"transparent",strokeWidth:s,name:"p"+r+"m"+e});if(wardrobe.doors[r].material.length!==0&&parseInt(wardrobe.doors[r].material[e])!=0){var u=t,a=n,f=alto*i[e],l=new Image;l.onload=function(){var t=new Kinetic.Image({x:u,y:a,width:ancho/wardrobe.doors.length,height:f,image:l,name:"image"+e});layerpi.add(t);layerpi.draw()};var c=wardrobe.doors[r].material[e],h=$.ajax({type:"GET",url:"content/materialsource/"+c,async:!1,success:function(e){l.src=e}})}n+=alto*i[e];layerp.add(o)})();t+=ancho/wardrobe.doors.length}stagep.add(layerpi);stagep.add(layerp);stagep.draw();layerpi.draw();layerp.draw();var s=stagep.get(".image");s.apply("moveToBottom",{})}};