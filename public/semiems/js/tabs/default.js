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
				if (location.href !== "1"){
					location.href = "1";
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
		myUrl = location.href;
		this.tab=parseInt(myUrl.substring(myUrl.length-1));
	},
	goNext: function(){
		location.href = this.tab + 1; 
	},
	goBack: function(){
		location.href = this.tab - 1;
	}

}
App.Notice ={
	
}