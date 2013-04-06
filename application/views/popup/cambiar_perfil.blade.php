<div class="content-popup">
  <div class="close">
    <a href="#" id="close2" onClick="popup.closePopup();"><img src="semiems/img/close.png"/></a>
  </div>
  <p id="title_popup">Seleccione el perfil</p>
  	<div id="perfiles">
    @if($perfil == "0")
    	<div id='sel_parent'>
		    <ul>
			    <li><a class='selector' href='#' onClick='Tab4Controller.añadirPerfil(1);'>Minimalista</a></li>
			    <li><a class='selector' href='#' onClick='Tab4Controller.añadirPerfil(2);'>Clasico</a></li>
		    </ul>
	    </div>
    @elseif($perfil == "1")
        <div id='sel_parent'>
		    <ul>
			    <li><a class='selector' href='#' onClick='Tab4Controller.añadirPerfil(3);'>Lisas</a></li>
			    <li><a class='selector' href='#' onClick='Tab4Controller.añadirPerfil(4);'>Con perfil</a></li>
		    </ul>
	    </div>
	@elseif($perfil == "2")
        No existe Perfil en Armario sin puertas
    @endif
    </div>
</div>