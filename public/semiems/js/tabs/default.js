$(document).ready(function(){

	App.Navigator.initialize();

	$('#wardrobemenu a').click(function(e){
		e.preventDefault();
		var id = $(this).attr('href');
		$.ajax({
			type: 'POST',
			url: 'session/' + id,
			success: function(response) {
				//alert('Se ha cargado el armario con ID '+ response)
				if (location.href !== "1#wardrobe-create"){
					location.href = "1#wardrobe-create";
				} else {
					location.href.reload(true);
				}
			},
			error: function(){
				alert('Hubo un error al cargar el identificador');
			}
		});
	});
	$('.edit').click(function(){
		alert('Has hecho click en editar')
	});
	$('.delete').click(function(){
		alert('Has hecho click en borrar')
	});
	$('#link').click(function(){
		if(document.getElementById('link').className == "close") {
			$("#wardrobemenu").removeClass("show")
			$("#link").removeClass("close")
		}else{
			$("#wardrobemenu").addClass("show")
			$("#link").addClass("close")
		}
	});
	$('#help-btn').click(function(){
		App.Help.open();
	});
});

WardrobeMenuController = {
	show: function(){
		$("#wardrobemenu").addClass("show")
	},
	close: function(){
		$("#wardrobemenu").removeClass("show")
	},
}

App.Help = {
	open: function(){
		// Close WardrobeMenu
		$("#wardrobemenu").removeClass("show");
		// Show the help
		$('#help').show();
		setTimeout(function(){
			$('#help .content, #help .page-screen').addClass('show');
			$('#wardrobemenu').addClass('blur');
		},200);
	},
	close: function() {
		$('#help .page-screen, #help .content').removeClass('show');
		setTimeout(function(){
		$('#help').hide();
		$('#wardrobemenu').removeClass('blur');
		}, 500);

	}
}
App.Navigator = {
	tab:0,
	// Get the tab present
	initialize: function(){
		myHash = location.hash;
		if (myHash== '#config'){
			myUrl = location.href;
			var aux = myUrl.split('#');
			this.tab=parseInt(aux[0].substring(aux[0].length-1));
			setTimeout(function(){
				$('#wardrobe-create').hide();
			}, 500);
		}else if (myHash == '#wardrobe-create'){
			myUrl = location.href;
			var aux = myUrl.split('#');
			this.tab=parseInt(aux[0].substring(aux[0].length-1));
			setTimeout(function(){
				$('#config').hide();
			}, 500);
		}else{
			location.hash = "wardrobe-create";
			setTimeout(function(){
				$('#config').hide();
			}, 500);
		}
	},
	goNext: function(){
		location.href = this.tab + 1 + '#wardrobe-create'; 
	},
	goBack: function(){
		location.href = this.tab - 1 + '#wardrobe-create';
	},
	openApp: function(){
		//location.href = 1 + '#wardrobe-create';
		$('#wardrobe-create').show();
		location.hash = "wardrobe-create";
		setTimeout(function(){
			$('#config').hide();
		}, 500);
	},
	closeApp: function(){
		$('#config').show();
		location.hash = "config";
		setTimeout(function(){
			$('#wardrobe-create').hide();
		}, 500);
	},
	buttonConfig: function(){
		myHash = location.hash;
		if (myHash== '#config'){
			this.openApp();
		}else if (myHash == '#wardrobe-create'){
			this.closeApp();
		}

	}

}
App.Notice ={
	
}