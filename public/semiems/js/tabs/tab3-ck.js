//Documente ready
function AgregarAccInt(e){$("#accint").innerHTML="";$.each(wardrobe.modules[e].accint,function(e,t){$("#rut"+t).remove();$.ajax({type:"GET",url:"php/getAccInt.php",data:{id:parseInt(t)},success:function(e){$("#accint").append(e)}})})}$(document).ready(function(){$(document).bind("sync",function(){pintamodulos()});$(document).bind("error",function(){$("#containeri").html("No se ha cargado el armario")});WardrobeModel.fetch();$("a.next-tab").on("click",function(e){e.preventDefault();WardrobeModel.save();$(document).bind("next",function(){location.href="4"})});$("a.prev-tab").on("click",function(e){});$(".accint img").live("click",function(){var e=parseInt($(this).attr("ref")),t=moduleselect.substring(1,2),n=wardrobe.modules[t].accint.indexOf(e);n==-1&&wardrobe.modules[t].accint.push(e);Pintar_AccInt();Close_popup()})});var delRow=function(e){$("#rut"+e).remove();var t=wardrobe.modules[moduleselect].accint.indexOf(e);t!=-1&&wardrobe.modules[moduleselect].accint.splice(t,1)},Pintar_AccInt=function(){};Tab3Controller={modselect:null,initialize:function(){},pintarAccs:function(){$.ajax({type:"GET",url:"",success:function(e){$("#accints").append(e)}})},borrarAcc:function(){}};