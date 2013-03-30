//Document ready
$(document).ready(function(){
	$('a.next-tab').on('click',function(e){
		//e.preventDefault();
        WardrobeModel.initialize();
        WardrobeModel.guardarJson();
	});


});