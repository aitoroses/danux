//###################################################################### POPUP
popup = {
	name: '',
	response: {},
	data: {},		// Form data
	initialize: function(object){
		this.name = object.name;
		this.data = object.data;
		$(this).bind('sync', function(){
			this.show();
		});
	},
	fetch: function(object){
		this.initialize(object);
		$.ajax({
       		type: 'GET',  
            url: 'API/popup/' + this.name,
            data: this.data,
            success: function(data) {  
                popup.response = data;
                $(popup).trigger('sync');
                $(document).trigger('sync_popup');
            }  
        });
	},
	show: function(){
		this.openPopup();
		$('#popup').html(this.response);  
	},

	openPopup: function(){
		$('#popup').fadeIn('slow');
    	var page_screen = document.getElementById('page_screen');
    	page_screen.style.height = document.body.parentNode.scrollHeight + 'px';
    	page_screen.style.display = 'block';
	},
	closePopup: function(){
		$('#popup').fadeOut('fast');
    	var page_screen = document.getElementById('page_screen');
    	page_screen.style.display = 'none';
	},
};

