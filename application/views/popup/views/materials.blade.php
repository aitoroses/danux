<div class="content">
	<ul class="small-block-grid-2 large-block-grid-4">
		@foreach($data as $ele)
			<li>
				<div class="element" data-id="{{ $ele->id }}">
					<div class="picture"><img src="{{ 'semiems/contenido/Bibliotecas/mat_puertas/'.$folder.'/'.$ele->image }}"></div>
					<h5 class="title">{{ $ele->ref.' '.$ele->desc }}</h5>
				</div>
			</li>
		@endforeach
	</ul>
</div>