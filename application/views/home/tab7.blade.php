@layout('home.default')

@section('tab')
{{ HTML::script('semiems/js/src/tabs/tab7.js') }}

<div id="paso-7">
<h1>Configura los accesorios de estructura</h1>
<p>Haz click para seleccionar accesorios a la lista:</p>

 <a class='button' onclick="popup.openPopup();popup.fetch({name: 'accesoriosExterior'});" data-intro="Click para añadir los accesorios de exterior" data-position="bottom">Agregar Accesorio</a>

 <div id="acc_sel"></div>

</div>


@endsection
@section('help')
<div id="close-help"><a onClick="App.Help.close();"><img src="semiems/img/close.png"/></a></div>
<h1>Ayuda Tab 7</h1>



@endsection