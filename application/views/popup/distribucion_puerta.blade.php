<div class="content-popup">  
	<div class="close">
		<a href="#" id="close2" onClick="popup.closePopup();"><img src="semiems/img/close.png"/></a>
	</div>
	<p id="title_popup">Seleccione tipo de puerta</p>
	<div id="distribucionPuerta">
		<div class="content">
			@foreach($doors as $ele)	
				<div class="element" data-id="{{ $ele->id }}" data-div="{{ $ele->div }}">
					<div class="picture">
						<img src="{{ 'semiems/'.$ele->image.'/'.$ele->id.'.png' }}">
					</div>
					<h1 class="title">{{ $ele->id }}</h1>
				</div>
			@endforeach
		</div>
	</div>  	
</div>
