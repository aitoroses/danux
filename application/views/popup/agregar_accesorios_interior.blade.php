<div class="content-popup">
  <h1 id="title_popup">Selección de accesorio</h1>
  <h4>Haz click sobre un accesorio para elegirlo.</h4>
  <br>
  <div id="sel_parent"></div> 
  <div id="mat_puerta"> <!-- MATERIAL DE PUERTA? OJO CON QUITAR EL ID -->
    <div class="content">
      <ul class="small-block-grid-2 large-block-grid-2">
        @foreach($accs as $acc)
          <li style="border: 1px solid rgba(0,0,0,0.2)">
            <div class='element selectormat' data-ref="{{ $acc->id }}">
              <div class='picture'>
                @if($acc->img==NULL)
                  <img src="semiems/contenido/Bibliotecas/AccInt/dummie.jpg" desc="{{ $acc->desc }}" ref="{{ $acc->id }}"/>        
                @else
                  <img src="{{ 'semiems/contenido/Bibliotecas/AccInt/Loija/'.$acc->img }}" desc="{{ $acc->desc }}" ref="{{ $acc->id }}"/>        
                @endif 
              </div> 
              <p>Ref. {{ $acc->ref }}</p> 
              <p>{{ $acc->desc }}</p>
            </div>
          </li>
        @endforeach
      </ul>
    </div>
  </div>
</div>   
