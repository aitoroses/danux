<div class="content-popup">
    <div class="close">
        <a id="close2" onClick="popup.closePopup();">
            <img src="semiems/img/close.png"/>
        </a>
    </div>

    <p id="title_popup">Configuracion del modulo</p>
    <div id="mods_sel">

            <a onclick="popup.fetch({name:'seleccioninterior'})">
                <div class='title'>Distribución interior </div>
            </a>

            <span>ó</span>
   
            @if($double == 0)
                <a onclick="popup.fetch({name:'menuasimetricosimetrico'})">
                    <div class='title' >Cambiar a modulo doble </div>
                </a>
            @else
                <a onclick="Tab2Controller.cambiar_a_modulo_simple()">
                    <div class='title'>Cambiar a modulo simple</div>
                </a>
            @endif

    </div>
</div>