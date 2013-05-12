<div class="content-popup">
  <h1 id="title_popup">Seleccione el tirador</h1>
  <div id='handles'>
    <div class='content'>
      <ul class="small-block-grid-2 large-block-grid-5">
        @foreach($handles as $ele)
        <li>
          <div class="element" data-id="{{ $ele->id }}">
            <div class="picture">
              <img src="{{ 'semiems/contenido/Bibliotecas/tiradores/'.$ele->img }}"/>
            </div>
            <p>{{'Ref.'.$ele->codigo}}</p>
            <p class="title">{{ $ele->tiradores.'('.$ele->desc.') Tamaño: '.$ele->largura.'mm' }}</p>
          </div>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
</div>

