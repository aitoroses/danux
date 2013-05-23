<?php $i = 1; // Contador de modulos ?>
<ul>
    @foreach($accint as $accesorios)
        <li class="module">
            @if($accesorios[0]=='1' )
                <h4>Accesorios del módulo {{ $i }}   <span style="margin-left: 20px; font-size: 0.68em; color: #555 ">({{ sizeof($accesorios[1]) + sizeof($accesorios[2]) }} accesorios)</span></h4>
                <ul>
                    <li>
                        <h5>Accesorios del submódulo 1   <span style="margin-left: 20px; font-size: 0.68em; color: #555 ">({{sizeof($accesorios[1])}} accesorios)</span></h5>
                        <ul>
                        @if(sizeof($accesorios[1]) == 0)
                            <li>No hay accesorios todavia </li>
                        @else
                            @foreach($accesorios[1] as $ele)
                            <li>
                                {{ $ele->desc }}
                                <a class="close-reveal-modal" onClick="Tab3Controller.borrarAccesorioInterior({{ $ele->id }},{{ $i-1 }},0)"rel="{{ $ele->id }}">| x |</a>
                            </li>
                            @endforeach
                        @endif
                        </ul>
                    </li>
                    <li>
                        <h5>Accesorios del submódulo 2   <span style="margin-left: 20px; font-size: 0.68em; color: #555 ">({{sizeof($accesorios[2])}} accesorios)</span></h5>
                        <ul>
                        @if(sizeof($accesorios[2]) == 0)
                            <li>No hay accesorios todavia </li>
                        @else
                            @foreach($accesorios[2] as $ele)
                            <li>
                                {{ $ele->desc }}
                                <a class="close-reveal-modal" onClick="Tab3Controller.borrarAccesorioInterior({{ $ele->id }},{{ $i-1 }},1)"rel="{{ $ele->id }}">| x |</a>
                            </li>
                            @endforeach
                        @endif
                        </ul>
                    </li>
                </ul>
            @else
             <h4>Accesorios del módulo {{ $i }}   <span style="margin-left: 20px; font-size: 0.68em; color: #555 ">({{sizeof($accesorios[1])}} accesorios)</span></h4>
                <ul>
                    @if(sizeof($accesorios[1]) == 0)
                        <li>No hay accesorios todavia </li>
                    @else
                        @foreach($accesorios[1] as $ele)
                        <li>
                            {{ $ele->desc }}
                            <a class="close-reveal-modal" onClick="Tab3Controller.borrarAccesorioInterior({{ $ele->id }},{{ $i-1 }},0)"rel="{{ $ele->id }}">| x |</a>
                        </li>
                        @endforeach
                    @endif
                </ul> 
            @endif
        </li> 
        <?php $i += 1; ?>
        <br>

    @endforeach
</ul>