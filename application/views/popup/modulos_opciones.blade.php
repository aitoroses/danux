<div class="content-popup">
    <h1 id="title_popup">Configura el modulo seleccionado</p>
    <h3>Tienes 2 opciones:</h3>
    <ul>
        <li>
            Elegir la <span style="font-weight: bold">distribucion interior</span> del modulo: 
            <a onclick="popup.fetch({name:'seleccioninterior'})">
                <div>Haz click aqui</div>
            </a>
        </li>
        <li>
            @if($double == 0)
                Dividir el módulo y convertirlo en <span style="font-weight: bold">modulo doble</span> o si ya es doble convertirlo en <span style="font-weight: bold">modulo simple (Por defecto)</span>:
                <a onclick="popup.fetch({name:'menuasimetricosimetrico'})">
                    <div>Haz click aqui para cambiar a modulo doble </div>
                </a>
            @else
                Volver a convertir a <span style="font-weight: bold">modulo simple</span>:
                <a onclick="Tab2Controller.cambiar_a_modulo_simple()">
                    <div>Haz click aqui para cambiar a modulo simple</div>
                </a>
            @endif
        </li>
    </ul>
</div>