
<ul>
    <li class="module">
        <ul>
            @foreach($accext as $ele)
            <li>
                {{ $ele->desc }}
                <a onClick="Tab7Controller.borrarAccesorioExterior({{ $ele->id }})">
                    <img src="semiems/img/close.png"/>
                </a>
            </li>
            @endforeach
        </ul> 
    </li> 
</ul>