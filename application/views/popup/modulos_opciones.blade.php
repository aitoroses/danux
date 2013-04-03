<div class="content-popup">
    <div class="close"><a href="#" id="close2" onClick="popup.closePopup();"><img src="semiems/img/close.png"/></a></div>

    <p id="title_popup">Configuracion del modulo</p>
    <div id="mods_sel">

            <a href="#"  onclick="popup.fetch({name:'seleccioninterior'})">
                <div class='title'>Distribución interior </div>
            </a>

            <span>ó</span>
   
            @if($double == 0)
                <a href="#"  onclick="popup.fetch({name:'divisioninterior', data: anchuratemp})">
                    <div class='title' >Cambiar a modulo doble </div>
                </a>
            @else
                <a href="#"  onclick="cambiar_a_modulo_simple()">
                    <div class='title'>Cambiar a modulo simple</div>
                </a>
            @endif

    </div>
</div>