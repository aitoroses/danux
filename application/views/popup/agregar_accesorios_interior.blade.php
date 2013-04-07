<div class="content-popup">
  <div class="close">
    <a href="#" id="close2" onClick="popup.closePopup();"><img src="semiems/img/close.png"/></a>
  </div>
  
  <p id="title_popup">Seleccione el material del modulo/os seleccionado/os</p>
  <div id="sel_material">
  <div id="sel_parent">
  </div>
  </br>  
  <div id="mat_puerta">
    <div class="content">    
    @foreach($accs as $acc)
        <div class='element selectormat' data-ref="{{ $acc->ref }}">
          <div class='picture'><img src="{{ 'semiems/contenido/Bibliotecas/AccInt/Loija/'.$acc->img }}" desc="{{ $acc->desc }}" ref="{{ $acc->id }}"/></div> 
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