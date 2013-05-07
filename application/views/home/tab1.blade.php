@layout('home.default')

@section('tab')
{{ HTML::script('semiems/js/src/tabs/tab1.js') }}
<div id="paso-1" class="ui-tabs-panel">

	<div id="errors"></div>
	<div class="left">
	<h2>Crea un presupuesto</h2>
	@include('home.errors')
	
	{{ Form::open('API/budget', 'POST', array('id' => 'frm', 'name' => 'frm')) }}
	<fieldset>
 		<p class="editable"><label style="font-weight: bold;"> Nombre: </label>
 		{{ Form::text('name', Input::old('name'), array('size' => 40, 'id' => 'name', 'data-intro' => "Introduce el nombre del presupuesto", 'data-position' => "top")) }}</p>
 	</fieldset>
 	<div class="medidas">
 		<img class="closet" src="semiems/img/closet.jpg">
 		<p class="heights-text">Introduce las medidas del armario (mm):</p>
	 	<fieldset class="alto">
			<label> Alto: </label>
			{{ Form::text('malto', Input::old('name'), array('size' => 6)) }}
		</fieldset>
		<fieldset class="ancho">
			<label> Ancho: </label>
			{{ Form::text('mancho', Input::old('name'), array('onChange' => "calculo_puertas(document.frm.npuertas)", 'size' => 6)) }}
		</fieldset>
	
		<fieldset class="profundidad">
			<label> Profundidad: </label>
			{{ Form::text('mprof', Input::old('name'), array('size' => 6)) }}
		</fieldset>
	</div>
	<div class="type-of-doors">
		<fieldset>
			<p style="font-weight: bold;">Tipo y numero de puertas:</p>
			<label> Tipo de puertas</label>
			{{ Form::select('puerta', array('3' => '', '2' => 'Armario sin puertas', '1' => 'Batientes', '0' => 'Correderas' ), Input::old('name'), array('onChange' => "calculo_puertas(document.frm.npuertas)")) }}
		</fieldset>
		<fieldset>
			<label>Numero de <span id="type">puertas</span>: </label>
			<select name="npuertas" onChange="puertas_impares_bat()"></select>
			<div id="puertas_imp_bat"></div>
		</fieldset>
	</div>
	</form>
	{{ Form::close() }}

 	<a class='next-tab mover'>Siguiente &#187;</a> 
</div>
<script type="text/javascript">
	id = $('body').data('wardrobe');
	if (id > 0) {
		$('input').attr('readonly', true);
		$('select').attr('disabled', true);
		$('input#name').attr('readonly', false);
		$('.editable').append('<span> (Campo editable)</span>');
		$('.editable span').css({'color': '#b62718', 'font-weight': 'bold'});
	}
</script>
@endsection

@section('help')
<div id="close-help"><a onClick="App.Help.close();"><img src="semiems/img/close.png"/></a></div>
<h1>Ayuda Tab 1</h1>

@endsection