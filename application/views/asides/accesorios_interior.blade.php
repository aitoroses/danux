<?php $i = 1; // Contador de modulos ?>
<ul>
    @foreach($accint as $accesorios)
        <li class="module">
            <h2>Modulo {{ $i }}</h2>
            <ul>
                @foreach($accesorios as $ele)
                <li>
                    {{ $ele->desc }}
                    <a href="#" onClick="Tab3Controller.borrarAccesorioInterior({{ $ele->id }},{{ $i-1 }})"rel="{{ $ele->id }}">
                        <img src="semiems/img/close.png"/>
                    </a>
                </li>
                @endforeach
            </ul> 
        </li> 
        <?php $i += 1; ?>
    @endforeach
</ul>