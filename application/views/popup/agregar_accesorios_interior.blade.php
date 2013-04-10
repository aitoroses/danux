<div class="content-popup">
  <div class="close">
    <a href="#" id="close2" onClick="popup.closePopup();"><img src="semiems/img/close.png"/></a>
  </div>
  
  <p id="title_popup">Seleccione un accesorio para añadirlo al modulo</p>
  <div id="sel_material">
  <div id="sel_parent">
  </div> 
  <div id="mat_puerta">
    <div class="content">  
    @foreach($accs as $acc) 
      <div class='element selectormat' data-ref="{{ $acc->id }}">
        <div class='picture'>
          @if($acc->img==NULL)
            <img src="semiems/contenido/Bibliotecas/AccInt/dummie.jpg" desc="{{ $acc->desc }}" ref="{{ $acc->id }}"/>        
          @else
            <img src="{{ 'semiems/contenido/Bibliotecas/AccInt/Loija/'.$acc->img }}" desc="{{ $acc->desc }}" ref="{{ $acc->id }}"/>        
          @endif 
          
        </div> 
        <div class='title'>
          Ref. {{ $acc->ref }} ({{ $acc->desc }})
        </div>
      </div>
    @endforeach
    </div>
  </div>
  </div>
  
 </div>          
</div> 