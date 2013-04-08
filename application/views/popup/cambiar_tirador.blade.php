<div class="content-popup">
  <div class="close">
    <a href="#" id="close2" onClick="popup.closePopup();"><img src="semiems/img/close.png"/></a>
  </div>
      <p id="title_popup">Seleccione el tirador</p>
      <div id='handles'>
        <div class='content'>
          @foreach($handles as $ele) 
          <div class="element" data-id="{{ $ele->id }}">
            <div class="picture">
              <img src="{{ 'semiems/contenido/Bibliotecas/tiradores/'.$ele->img }}"/>
            </div>
            <h1 class="title">{{ $ele->tiradores.' / Ref.'.$ele->codigo.'('.$ele->desc.') Tamaño: '.$ele->largura.'mm' }}</h1>
          </div>
          @endforeach
        </div>
      </div>
</div>

