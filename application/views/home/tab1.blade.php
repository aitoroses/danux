@layout('home.default')

@section('tab')
{{ HTML::script('semiems/js/tabs/tab1.js') }}
<div id="paso-1" class="ui-tabs-panel">

	<div id="errors"></div>
	<div class="left">
	<h2>Crea un presupuesto</h2>
	@include('home.errors')
	<p>Introduce las medidas de tu hueco (mm):</p>
	{{ Form::open('API/budget', 'POST', array('id' => 'frm', 'name' => 'frm')) }}
	<fieldset>
 	<p class="editable"><label> Nombre del presupuesto: </label>{{ Form::text('name', Input::old('name'), array('size' => 40, 'id' => 'name')) }}</p>
	<label> Alto: </label>{{ Form::text('malto', Input::old('name'), array('size' => 6)) }}
	<label> Ancho: </label>{{ Form::text('mancho', Input::old('name'), array('onChange' => "calculo_puertas(document.frm.npuertas)", 'size' => 6)) }}
	<label> Profundidad: </label>{{ Form::text('mprof', Input::old('name'), array('size' => 6)) }}
	<p></p>
	<p>Selecciona el tipo y numero de puertas que deseas:</p>
	<label> Tipo de puertas</label>
	{{ Form::select('puerta', array('3' => '', '2' => 'Armario sin puertas', '1' => 'Batientes', '0' => 'Correderas' ), Input::old('name'), array('onChange' => "calculo_puertas(document.frm.npuertas)")) }}

	<label>Numero de <span id="type">puertas</span>: </label>
	<select name="npuertas" onChange="puertas_impares_bat()">
	</select>
	<p></p>
	<div id="puertas_imp_bat"></div>
	</fieldset>
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