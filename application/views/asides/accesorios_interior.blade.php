<?php $i = 1; // Contador de modulos ?>
<ul>
    @foreach($accint as $accesorios)
        <li>
            <h2>Modulo {{ $i }}</h2>
            <ul>
                @foreach($accesorios as $ele)
                <li>{{ $ele->desc }}</li>
                @endforeach
            </ul> 
        </li> 
        <?php $i += 1; ?>
    @endforeach
</ul>