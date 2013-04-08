<div class="content">
	@foreach($data as $ele)	
	<div class="element" data-tipoperfil="{{ $ele->tipo_perfil }}" data-id="{{ $ele->id }}">
		<div class="picture"><img src="{{ 'semiems/contenido/Bibliotecas/perfiles/'.$ele->image }}"></div>
		<h1 class="title">{{ $ele->name }}</h1>
	</div>
	@endforeach
</div>