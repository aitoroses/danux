function save_accext(){ii=[];if($(document).find("#accext li select")){$(document).find("#accext li select").each(function(e){ind=$(this.options.selectedIndex)[0];$(this.options)[ind]&&ii.push($(this.options)[ind].value)});wardrobe.accext=ii}}WardrobeModel=new Object({wardrobe:{},initialize:function(){return this.createJson()},createJson:function(){var e=document.frm.npuertas.value;posicion_impar="0";e%2!=0&document.frm.puerta.value==1&&(posicion_impar=document.frm.donde_imp.value);this.wardrobe={data:{name:document.frm.name.value,width:document.frm.mancho.value,height:document.frm.malto.value,prof:document.frm.mprof.value,nmods:"0",doors:document.frm.npuertas.value,typedoor:document.frm.puerta.value,paritypos:posicion_impar,handle:"0",tperfil:"0",perfil:"0",marco:"0"},modules:[],doors:[],accext:[]};if(document.frm.puerta.value==0||document.frm.puerta.value==2){var e=document.frm.npuertas.value,t=document.frm.npuertas.value;this.wardrobe.data.nmods=t;for(x=0;x<t;x++)this.wardrobe.modules.push({"double":0,ddouble:0,width:document.frm.mancho.value/t,height:document.frm.malto.value,ref1:0,ref2:0,accint:[]})}else if(document.frm.puerta.value==1){var e=document.frm.npuertas.value,t=Math.round(parseInt(document.frm.npuertas.value)/2),n=document.frm.mancho.value/document.frm.npuertas.value,r=document.frm.mancho.value/document.frm.npuertas.value*2;this.wardrobe.data.nmods=t;for(x=0;x<t;x++){if(e%2==0)var i=r;else{var s=parseInt(document.frm.donde_imp.value-1)/2;if(x==s)var i=n;else var i=r}this.wardrobe.modules.push({"double":0,ddouble:0,width:i,height:document.frm.malto.value,ref1:0,ref2:0,accint:[]})}}for(x=0;x<e;x++)this.wardrobe.doors.push({type:"1",material:{0:0}});return this.wardrobe},guardarJson:function(){$.ajax({type:"POST",url:"API/budget",data:{wardrobe:WardrobeModel.getWardrobe()},success:function(e){e!=="OK"?$("#errors").html(e):location.href="2"},error:function(){alert("Hubo un error")}})},cargarJson:function(e){$.ajax({type:"GET",url:"API/budget/"+e+"/wardrobe",dataType:"json",async:!1,success:function(e){WardrobeModel.wardrobe.data=e;document.frm.name.value=wardrobe.data.name;document.frm.malto.value=wardrobe.data.height;document.frm.mancho.value=wardrobe.data.width;document.frm.mprof.value=wardrobe.data.prof;document.frm.puerta.value=wardrobe.data.typedoor;document.frm.npuertas.value=wardrobe.data.doors;document.frm.npuertas.value%2!=0&&document.frm.puerta.value==1&&(document.frm.donde_imp.value=wardrobe.data.paritypos)}})},save:function(){id=$("body").data("wardrobe");$.ajax({type:"PUT",url:"API/json/"+id,dataType:"json",data:{wardrobe:WardrobeModel.getWardrobe()},success:function(e){alert("Se ha actualizado el armario");$(document).trigger("next")},error:function(){alert("Error: No se ha sincronizado el armario")}})},fetch:function(){id=$("body").data("wardrobe");$.ajax({type:"GET",url:"API/json/"+id,dataType:"json",success:function(e){WardrobeModel.wardrobe=e;$(document).trigger("sync");console.log(WardrobeModel.getWardrobe())},error:function(){alert("Error: No se ha sincronizado el armario");$(document).trigger("error")}})},getWardrobe:function(){return this.wardrobe}});