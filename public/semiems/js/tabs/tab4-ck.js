//Documente ready
function cargar_perfiles(){var e=parseInt(wardrobe.data.tperfil);e==0?$("#perfil_sel").html("No has seleccionado perfil"):e==1?$("#perfil_sel").html("Has seleccionado perfil Minimalista"):e==2?$("#perfil_sel").html("Has seleccionado perfil Clasico"):e==3?$("#perfil_sel").html("Has seleccionado puerta sin perfil (Lisa)"):e==4&&$("#perfil_sel").html("Has seleccionado puerta con perfil")}function get_perfiles(e){e==1?wardrobe.data.tperfil=e:e==2?wardrobe.data.tperfil=e:e==3?wardrobe.data.tperfil=e:e==4&&(wardrobe.data.tperfil=e);Close_popup();acabado_perfil();guardarJson()}$(document).ready(function(){$(document).bind("sync",function(){Tab4Controller.pintarPerfil();Tab4Controller.pintarTirador()});$(document).bind("sync_save",function(){Tab4Controller.pintarPerfil();Tab4Controller.pintarTirador()});$(document).bind("error",function(){$("#containeri").html("No se ha cargado el armario")});WardrobeModel.fetch();$("a.next-tab").on("click",function(e){e.preventDefault();$(document).bind("next",function(){location.href="4"})});$("a.prev-tab").on("click",function(e){});$(".item5 img").live("click",function(){var e=$(this).attr("ref");Tab4Controller.añadirTirador(e);popup.closePopup()})});Tab4Controller={initialize:function(){},pintarPerfil:function(){$("#perfil_sel").html("&nbsp");$.ajax({type:"GET",url:"API/asides/getPerfil",success:function(e){$("#perfil_sel").append(e)}})},pintarTirador:function(){$("#handles_sel").html("&nbsp");$.ajax({type:"GET",url:"API/asides/getTirador",success:function(e){$("#handles_sel").append(e)}})},"añadirTirador":function(e){WardrobeModel.wardrobe.data.handle=e;WardrobeModel.save()},"añadirPerfil":function(e){WardrobeModel.wardrobe.data.tperfil=e;WardrobeModel.save();popup.closePopup()}};