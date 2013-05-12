//###################################################################### POPUP
popup = {
	name: '',
	response: {},
	data: {},		// Form data
	initialize: function(object){
		this.name = object.name;
		this.data = object.data;
		$(this).bind('sync', function(){
			this.refresh();
		});
	},
	fetch: function(object){
		this.initialize(object);
		$.ajax({
       		type: 'GET',  
            url: 'API/popup/' + this.name,
            data: {data: this.data},
            success: function(data) {  
                popup.response = data;
                $(popup).trigger('sync');
                $(document).trigger('sync_popup');
            }  
        });
	},
	refresh: function(){
		$('#popup .content').html(this.response);  
	},

	openPopup: function(){
		$('#popup').foundation('reveal', 'open');
		this.refresh();
	},
	closePopup: function(){
		$('#popup').foundation('reveal', 'close');
		//$('.reveal-modal-bg').remove();
	}
};

