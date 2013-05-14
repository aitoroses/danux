<ul>
    @foreach($accext as $ele)
    <li>
        {{ $ele->desc }}
        <a onClick="Tab7Controller.borrarAccesorioExterior({{ $ele->id }})">| x |</a>
    </li>
    @endforeach
</ul> 
