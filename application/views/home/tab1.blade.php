@layout('home.default')

@section('tab')
{{ HTML::script('semiems/js/src/tabs/tab1.js') }}
<div id="errors"></div>
<div id="paso-1">
	<div class="row">
		<h1>Configuración inicial del armario</h1>
		@include('home.errors')
		{{ Form::open('API/budget', 'POST', array('id' => 'frm', 'name' => 'frm')) }}
			<fieldset>
		 		<p class="editable"><label style="font-weight: bold;"> Nombre: </label>
		 		{{ Form::text('name', Input::old('name'), array('size' => 40, 'id' => 'name', 'data-intro' => "Introduce el nombre del presupuesto", 'data-position' => "top")) }}</p>
		 	</fieldset>

		 	<div class="medidas">
		 		<div class="row">
		 			<div class="small-6 large-6 columns">
		 				<img style="width: 100%" class="closet" src="semiems/img/closet.jpg">
		 			</div>
		 			<div class="small-6 large-6 columns">
		 				<h2 class="heights-text">Introduce las medidas:</h2>
					 	<fieldset class="alto" data-intro="Alto del hueco en milimetros" data-position="left">
							<label> Alto (mm): </label>
							{{ Form::text('malto', Input::old('name'), array('size' => 6, 'onkeyup' => 'validate_real(this)')) }}
							<label class="message"></label>

						</fieldset>
						<fieldset class="ancho" data-intro="Ancho del hueco en milimetros" data-position="right">
							<label> Ancho (mm): </label>
							{{ Form::text('mancho', Input::old('name'), array('onkeyup' => "validate_real(this);calculo_puertas(document.frm.npuertas);", 'size' => 6)) }}
							<label class="message"></label>

						</fieldset>
					
						<fieldset class="profundidad" data-intro="Profundidad del hueco en milimetros" data-position="right">
							<label> Profundidad (mm): </label>
							{{ Form::text('mprof', Input::old('name'), array('size' => 6, 'onkeyup' => 'validate_real(this)')) }}
							<label class="message"></label>
						</fieldset>
		 			</div>
		 		</div>
		 		<div class="small-6 large-6 large-offset-6">
			 		<div class="type-of-doors">
						<fieldset>
							<h2>Tipo y numero de puertas:</h2>
							<label> Tipo de puertas</label>
							{{ Form::select('puerta', array('3' => '', '2' => 'Armario sin puertas', '1' => 'Batientes', '0' => 'Correderas' ), Input::old('name'), array('onChange' => "calculo_puertas(document.frm.npuertas)", 'data-intro' => "Tipos de armarios", 'data-position' => "right")) }}
						</fieldset>
						<fieldset>
							<label>Numero de <span id="type">puertas</span>: </label>
							<select name="npuertas" onChange="puertas_impares_bat()" data-intro="Numero de puertas" data-position="right"></select>
							<div id="puertas_imp_bat"></div>
						</fieldset>
					</div>
					{{ Form::close() }}
					<p>Haz click en <span style="font-weight: bold">Siguiente</span> en la barra superior para continuar.</p>
				</div>
			</div>
			
		
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