//Documente ready
$(document).ready(function(){$(document).bind("sync",function(){Tab7Controller.pintarAccesorioExterior()});$(document).bind("sync_popup",function(){$("#mat_puerta .element").click(function(){var e=$(this).data("id");Tab7Controller.añadirAccesorioExterior(e);popup.closePopup()})});$(document).bind("sync_save",function(){Tab7Controller.pintarAccesorioExterior()});$(document).bind("error",function(){});WardrobeModel.fetch();$("a.next-tab").on("click",function(e){e.preventDefault();App.Navigator.goNext()});$("a.prev-tab").on("click",function(e){App.Navigator.goBack()})});Tab7Controller={initialize:function(){},pintarAccesorioExterior:function(){$("#acc_sel").html("&nbsp");$.ajax({type:"GET",url:"API/asides/getAccExt",success:function(e){$("#acc_sel").append(e)}})},"añadirAccesorioExterior":function(e){WardrobeModel.wardrobe.accext.push(e);WardrobeModel.save();popup.closePopup()},borrarAccesorioExterior:function(e){var t=WardrobeModel.wardrobe.accext.indexOf(e);t!=-1&&WardrobeModel.wardrobe.accext.splice(t,1);WardrobeModel.save()}};