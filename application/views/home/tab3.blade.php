@layout('home.default')

@section('tab')
{{ HTML::script('semiems/js/tabs/tab3.js') }}
<div id="paso-3" class="ui-tabs-panel">
<h2>Añade Accesorios de interior</h2>

<div id="containeri"></div>
<div id="acc_ints"></div>

<a href='#' class='next-tab mover' rel='4'>Siguiente &#187;</a>
<a href='#' class='prev-tab mover' rel='2'>&#171; Atras</a>

</div>


@endsection


