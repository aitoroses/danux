//Documente ready
function countRepeated(e){var t=arguments[1]||[],n=0;for(;n<e.length;n++)Object.prototype.hasOwnProperty.call(e,n)&&(e[n]instanceof Array?t=countRepeated(e[n],t):t[e[n]]?t[e[n]]++:t[e[n]]=1);return t}$(document).ready(function(){$(document).on("undo",function(){App.History.undoWardrobe();pintapuertas();WardrobeModel.save()});$(document).on("stack",function(){App.History.saveWardrobe()});$(document).bind("sync",function(){pintapuertas();$(document).trigger("stack");Tab4Controller.pintarPerfil();Tab4Controller.pintarTirador()});$(document).bind("sync_popup",function(){document.getElementById("handles")&&$("#handles .element").click(function(){var e=$(this).data("id");Tab4Controller.añadirTirador(e);popup.closePopup()});document.getElementById("distribucionPuerta")&&$("#distribucionPuerta .element").click(function(){$(document).trigger("stack");var e=$(this).data("id"),t=$(this).data("div");$.each(materialselect,function(n,r){var i=r.substring(1,2);WardrobeModel.wardrobe.doors[i].type=e;var s=[];for(var o=0;o<t;o++)s.push(0);WardrobeModel.wardrobe.doors[i].material=s});materialselect=[];WardrobeModel.save();popup.closePopup()})});$(document).bind("sync_save",function(){pintapuertas();Tab4Controller.pintarPerfil();Tab4Controller.pintarTirador()});$(document).bind("error",function(){$("#containerp").html("No se ha cargado el armario")});WardrobeModel.fetch();$("a.next-tab").on("click",function(e){e.preventDefault();App.Navigator.goNext()});$("a.prev-tab").on("click",function(e){App.Navigator.goBack()})});Tab5Controller={initialize:function(){},getDoorMaterials:function(e){$.ajax({type:"GET",url:"API/popup/view/materialsView",data:{type:e},success:function(e){$("#materiales").html(e);$("#materiales .element").click(function(){$(document).trigger("stack");var e=$(this).data("id");$.each(materialselect,function(t,n){var r=n.substring(1,2),i=n.substring(3,4);WardrobeModel.wardrobe.doors[r].material[i]=e});materialselect=[];WardrobeModel.save();popup.closePopup()})}})}};Tab4Controller={initialize:function(){},pintarPerfil:function(){$("#perfil_sel").html("&nbsp");$.ajax({type:"GET",url:"API/asides/getPerfil",success:function(e){$("#perfil_sel").append(e)}})},pintarTirador:function(){$("#handles_sel").html("&nbsp");$.ajax({type:"GET",url:"API/asides/getTirador",success:function(e){$("#handles_sel").append(e)}})},"añadirTirador":function(e){WardrobeModel.wardrobe.data.handle=e;WardrobeModel.save()},"añadirPerfil":function(e,t){WardrobeModel.wardrobe.data.tperfil=e;WardrobeModel.wardrobe.data.perfil=t;WardrobeModel.save();popup.closePopup()},getPerfilAcabados:function(e){$.ajax({type:"GET",url:"API/popup/view/perfilesView",data:{type:e},success:function(e){$("#materiales").html(e);$("#materiales .element").click(function(){var e=$(this).data("tipoperfil"),t=$(this).data("id");Tab4Controller.añadirPerfil(e,t)})}})}};