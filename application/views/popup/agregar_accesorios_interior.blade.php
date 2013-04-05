<div class="content-popup">
  <div class="close">
    <a href="#" id="close2" onClick="popup.closePopup();"><img src="semiems/img/close.png"/></a>
  </div>
  
  <p id="title_popup">Seleccione el material del modulo/os seleccionado/os</p>
  <div id="sel_material">
  <div id="sel_parent">
  </div>
  </br>
  <div id="aux">   
    <div id="mat_puerta">        
      @foreach($list as $li)
                {{$li}}
      @endforeach
    </div>
  </div>
  
 </div>          
</div> 