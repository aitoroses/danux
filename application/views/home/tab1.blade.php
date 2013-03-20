@layout('home.default')

@section('tab')
<div id="paso-1" class="ui-tabs-panel">
	<div>
	<div class="left">
	<h2>Crea un presupuesto</h2>
	<p>Introduce las medidas de tu hueco (mm):</p>
	<form id="frm" name="frm" action="php/guardadatos.php"> 
	<fieldset>
 	<p><label> Nombre del presupuesto: </label><input type="text" name="name" size="40"></p>
	<label> Alto: </label><input type="text" name="malto" size="6">
	<label> Ancho: </label><input type="text" name="mancho" size="6"  onchange="calculo_puertas(document.frm.npuertas)">
	<label> Profundidad: </label><input type="text" name="mprof" size="6">
<p></p>
	<p>Selecciona el tipo y numero de puertas que deseas:</p>
	<label> Tipo de puertas</label>
	<select name="puerta" onChange="calculo_puertas(document.frm.npuertas)"> 
	<option id="puerta" value = "3"> </option>
	<option id="puerta" value = "2">Armario sin puertas</option> 
	<option id="puerta" value = "1">Batientes</option> 
	<option id="puerta" value = "0">Correderas</option> 
	</select> 

	<label>Numero de puertas: </label>
	<select name="npuertas" onChange="puertas_impares_bat()">
	</select>
	<p></p>
	<div id="puertas_imp_bat"></div>
	</fieldset>
	</form>
 
  	<br/>
 	</div>
 	<div class="right">
 	<br/>
 	
 	<h2><a href='#' onClick="pop_up('flexigrid');"> O carga un presupuesto existente</a></h2>
		<!-- CARGA PRESUPUESTOS -->  

			<input type="radio" name="radio" class="radio" onClick="resetWardrobe()"> Nuevo a partir de armario </input>

 	</div>
 	<div id="result"></div>
 	</div>
 	<a href='#' class='next-tab mover' rel='2' >Siguiente &#187;</a> 
</div>
@endsection