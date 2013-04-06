<div class="content-popup">
  <div class="close">
    <a href="#" id="close2" onClick="popup.closePopup();"><img src="semiems/img/close.png"/></a>
  </div>
      <p id="title_popup">Seleccione el tirador</p>
      <div id='handles'><ul>
      @foreach($list as $li)
                {{$li}}
      @endforeach
      </ul></div>
    </div>