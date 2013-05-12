<div class="content-popup">  
	<h1>Selecciona la estructura de la puerta</h1>
	<div id="distribucionPuerta">
		<div class="content">
			<ul class="small-block-grid-2 large-block-grid-8">
				@foreach($doors as $ele)
					<li>	
						<div class="element" data-id="{{ $ele->id }}" data-div="{{ $ele->div }}">
							<div class="picture">
								<img src="{{ 'semiems/'.$ele->image.'/'.$ele->id.'.png' }}">
							</div>
							<h1 class="title">{{ $ele->id }}</h1>
						</div>
					</li>
				@endforeach
			</ul>
		</div>
	</div>  	
</div>
