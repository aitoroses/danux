<?php $i = 1; // Contador de modulos ?>
<ul>
    @foreach($accint as $accesorios)
        <li class="module">
            <h4>Accesorios del módulo {{ $i }}   <span style="margin-left: 20px; font-size: 0.68em; color: #555 ">({{sizeof($accesorios)}} accesorios)</span></h2>
            <ul>
                @if(sizeof($accesorios) == 0)
                    <li>No hay accesorios todavia </li>
                @else
                    @foreach($accesorios as $ele)
                    <li>
                        {{ $ele->desc }}
                        <a class="close-reveal-modal" onClick="Tab3Controller.borrarAccesorioInterior({{ $ele->id }},{{ $i-1 }})"rel="{{ $ele->id }}">| x |</a>
                    </li>
                    @endforeach
                @endif
            </ul> 
        </li> 
        <?php $i += 1; ?>
        <br>

    @endforeach
</ul>