$(document).ready(function(){App.Navigator.initialize();$("#wardrobemenu a").click(function(e){e.preventDefault();var t=$(this).attr("href");$.ajax({type:"POST",url:"session/"+t,success:function(e){location.href!=="1#wardrobe-create"?location.href="1#wardrobe-create":location.href.reload(!0)},error:function(){alert("Hubo un error al cargar el identificador")}})});$(".edit").click(function(){alert("Has hecho click en editar")});$(".delete").click(function(){alert("Has hecho click en borrar")});$("#link").click(function(){if(document.getElementById("link").className=="close"){$("#wardrobemenu").removeClass("show");$("#link").removeClass("close")}else{$("#wardrobemenu").addClass("show");$("#link").addClass("close")}});$("#help-btn").click(function(){App.Help.open()})});WardrobeMenuController={show:function(){$("#wardrobemenu").addClass("show")},close:function(){$("#wardrobemenu").removeClass("show")}};App.Help={open:function(){$("#wardrobemenu").removeClass("show");$("#help").show();setTimeout(function(){$("#help .content, #help .page-screen").addClass("show");$("#wardrobemenu").addClass("blur")},200)},close:function(){$("#help .page-screen, #help .content").removeClass("show");setTimeout(function(){$("#help").hide();$("#wardrobemenu").removeClass("blur")},500)}};App.Navigator={tab:0,initialize:function(){myUrl=location.href;var e=myUrl.split("#");this.tab=parseInt(e[0].substring(e[0].length-1))},goNext:function(){location.href=this.tab+1},goBack:function(){location.href=this.tab-1},buttonConfig:function(){var e=location.hash;e=="#config"?App.Router.navigate("wardrobe-create",{trigger:!0}):e=="#wardrobe-create"?App.Router.navigate("config",{trigger:!0}):App.Router.navigate("config",{trigger:!0})}};App.Router=new(Backbone.Router.extend({initialize:function(){},routes:{"":"index",config:"config","wardrobe-create":"wardrobe"},sectionsID:["#config","#wardrobe-create"],navigateToSection:function(e){_this=this;$.each(_this.sectionsID,function(e,t){$(t).removeClass("show")});setTimeout(function(){$.each(_this.sectionsID,function(e,t){$(t).hide()});$(e).show();setTimeout(function(){$(e).addClass("show")},100)},300)},index:function(){_this=this;$(document).ready(function(){$.each(_this.sectionsID,function(e,t){$(t).hide();$(t).removeClass("show")});$("#wardrobe-create").addClass("show");setTimeout(function(){$("#wardrobe-create").show()},0)})},config:function(){this.navigateToSection("#config")},wardrobe:function(){this.navigateToSection("#wardrobe-create")}}));Backbone.history.start();App.Notice={};App.History=$.extend({saveWardrobe:function(){this.save(WardrobeModel.wardrobe)},undoWardrobe:function(){WardrobeModel.wardrobe=this.undo();this.get_size()==0&&this.saveWardrobe()}},new History);