<div class="content">
	@foreach($data as $ele)	
	<div class="element" data-id="{{ $ele->id }}">
		<div class="picture"><img src="{{ 'semiems/contenido/Bibliotecas/mat_puertas/'.$folder.'/'.$ele->image }}"></div>
		<h1 class="title">{{ $ele->ref.' '.$ele->desc }}</h1>
	</div>
	@endforeach
</div>