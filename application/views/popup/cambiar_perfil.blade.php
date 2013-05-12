<div class="content-popup">
  <h1 id="title_popup">Configura el tipo de puertas:</h1>
  	<div id="perfiles">
    @if($perfil == "0")
    	<div id='sel_parent'>
		    <ul>
			    <li><a class='button selector' onClick='Tab4Controller.getPerfilAcabados(1);'>Minimalista</a></li>
			    <li><a class='button selector' onClick='Tab4Controller.getPerfilAcabados(2);'>Clasico</a></li>
		    </ul>
	    </div>
    @elseif($perfil == "1")
        <div id='sel_parent'>
		    <ul>
			    <li><a class='button selector' onClick='Tab4Controller.añadirPerfil(3,0);'>Lisas (Sin Perfil)</a></li>
			    <li><a class='button selector' onClick='Tab4Controller.añadirPerfil(4,0);'>Con perfil (Minimalista/Aluminio)</a></li>
		    </ul>
	    </div>
  	@elseif($perfil == "2")
          <p>No se puede se puede seleccionar un perfil o tipo de puerta lisa en un armario <span style="font-weight: bold">sin puertas</span></p>
    @endif
    <div id="materiales"></div>
    </div>
</div>