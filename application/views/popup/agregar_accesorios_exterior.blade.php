<div class="content-popup">
  <h1 id="title_popup">Seleccione una modificacion para el armario:</h1>
  <div id="sel_material">
  <div id="sel_parent">
  </div> 
  <div id="mat_puerta">
    <div class="content"> 
    <ul class="small-block-grid-2 large-block-grid-3">
      @foreach($accs as $acc)
        <li>
          <div class='element selectormat' data-id="{{ $acc->id }}">
            <div class='picture'>
              @if($acc->img==NULL)
                <img src="semiems/contenido/Bibliotecas/AccInt/dummie.jpg" desc="{{ $acc->desc }}" ref="{{ $acc->id }}"/>        
              @else
                <img src="{{ 'semiems/contenido/Bibliotecas/AccInt/Loija/'.$acc->img }}" desc="{{ $acc->desc }}" ref="{{ $acc->id }}"/>        
              @endif
            </div> 
            <div class='title'>
            <p>Ref. {{ $acc->ref }}</p>
            <p style="font-weight: bold">{{ $acc->desc }}</p>
            </div>
          </div>
        </li>
      @endforeach
    </ul>  
    </div>
  </div>
  </div>
  
 </div>          
</div> 