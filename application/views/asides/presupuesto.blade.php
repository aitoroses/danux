
<!--<table id='hor-minimalist-b' summary='Presupuesto'>
<thead>
<tr>
<th scope='col'>Pieza</th>
<th scope='col'>Unidades</th>
<th scope='col'>Precio unidad</th>
<th scope='col'>Subtotal</th>
<th scope='col'>Total</th>
</tr>
</thead>
<tbody>
<tr> <td>Costado interior</td><td>2</td><td>{{ $wardrobe["costadoInterior"]->precio }}</td><td>{{ $wardrobe["costadoInterior"]->precio*2 }}</td><td> </td></tr>
<tr> <td>Costado exterior</td><td>2</td><td>{{ $wardrobe["costadoExterior"]->precio }}</td><td>{{ $wardrobe["costadoExterior"]->precio*2 }}</td><td> </td></tr>

<?php $i=1;
$total_modulos=0;
 ?>
	@foreach ($wardrobe["module"] as $mod)
		<tr> <td>Modulo {{ $i }}</td><td></td><td></td><td></td><td> </td></tr>
		<tr> <td> {{ $mod["trasera"]["desc"] }} </td><td></td><td>{{ $mod["trasera"]["precio"] }}</td><td></td><td></td></tr>
		<tr> <td> {{ $mod["base"]["desc"] }} </td><td></td><td>{{ $mod["base"]["precio"] }}</td><td></td><td></td></tr>
		<tr> <td> {{ $mod["techo"]["desc"] }} </td><td></td><td>{{ $mod["techo"]["precio"] }}</td><td></td><td></td></tr>
		<?php $total_modulo = $mod["trasera"]["precio"]+$mod["base"]["precio"]+$mod["techo"]["precio"]?>
		<tr> <td>Total Interior Modulo {{ $i }}</td><td></td><td></td><td>{{$total_modulo}}</td><td> </td></tr>	
		<?php $i+=1;
		$total_modulos+=$total_modulo;
		?>

	@endforeach

<tr> <td>Total Armazon</td><td> </td><td> </td><td> </td><td>{{$total_modulos+$wardrobe["costadoInterior"]->precio*2+$wardrobe["costadoExterior"]->precio*2}}</td></tr>
</tbody>
</table>-->
<style type="text/css">
.align, th {
	text-align: center !important;
}
.bold {
	font-weight: bold;
	cursor: pointer;
}
.collapse {
	-webkit-transition: height 0.5s ease;
   -moz-transition: height 0.5s ease;
   -o-transition: height 0.5s ease;
   -webkit-transition: height 0.5s ease;
   height: auto;
   overflow: hidden;
}

.collapse.hide{
	height: 0;
	
}
.row div {
	text-align: center;
	padding-top: 3px;
	padding-bottom: 3px;
}
.row.under {
	border-bottom: 1px solid #333;
}
</style>

<div id="headers" class="bold">
	<div class="row under">
		<div class="columns large-2 small-2">Sección</div>
		<div class="columns large-2 small-2">Pieza</div>
		<div class="columns large-2 small-2">Unidades</div>
		<div class="columns large-2 small-2">Precio/unidad</div>
		<div class="columns large-2 small-2">Subtotal</div>
		<div class="columns large-2 small-2">Total</div>
	</div>
</div>
<div id="armazon">
	<div class="row under">
		<div class="columns large-2 small-2 bold">Armazón</div>
		<div class="columns large-2 small-2">-</div>
		<div class="columns large-2 small-2">-</div>
		<div class="columns large-2 small-2">-</div>
		<div class="columns large-2 small-2">-</div>
		<div class="columns large-2 small-2 bold">NaN €</div>
	</div>
	<div class="collapse">
		<div class="row under">
			<div class="columns large-2 small-2 bold">-</div>
			<div class="columns large-2 small-2">Pieza 1</div>
			<div class="columns large-2 small-2">-</div>
			<div class="columns large-2 small-2">-</div>
			<div class="columns large-2 small-2">-</div>
			<div class="columns large-2 small-2 bold">NaN €</div>
		</div>
		<div class="row under">
			<div class="columns large-2 small-2 bold">-</div>
			<div class="columns large-2 small-2">Pieza 2</div>
			<div class="columns large-2 small-2">-</div>
			<div class="columns large-2 small-2">-</div>
			<div class="columns large-2 small-2">-</div>
			<div class="columns large-2 small-2 bold">NaN €</div>
		</div>
		<div class="row under">
			<div class="columns large-2 small-2 bold">-</div>
			<div class="columns large-2 small-2">Pieza 2</div>
			<div class="columns large-2 small-2">-</div>
			<div class="columns large-2 small-2">-</div>
			<div class="columns large-2 small-2">-</div>
			<div class="columns large-2 small-2 bold">NaN €</div>
		</div>
	</div>
</div>

<br>
<table class="align" style="width: 100%">
	<thead>
		<th>Seccion</th>
		<th>Pieza</th>
		<th>Unidades</th>
		<th>Precio/Unidad</th>
		<th>Subtotal</th>
		<th>Total</th>
	</thead>
	<tbody>
		<!-- ARMAZON -->
		<tr>
			<td class="bold">Armazón</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td class="bold">NaN €</td>
		</tr>
		<div class="collapse">
			<tr>
				<td class="bold">-</td>
				<td>Pieza 1</td>
				<td>NaN</td>
				<td>NaN €</td>
				<td>NaN €</td>
				<td>-</td>
			</tr>
			<tr>
				<td class="bold">-</td>
				<td>Pieza 2</td>
				<td>NaN</td>
				<td>NaN €</td>
				<td>NaN €</td>
				<td>-</td>
			</tr>
			<tr>
				<td class="bold">-</td>
				<td>Pieza 3</td>
				<td>NaN</td>
				<td>NaN €</td>
				<td>NaN €</td>
				<td>-</td>
			</tr>
		</div>
	</tbody>
	<tbody>
		<!-- PUERTAS -->
		<tr>
			<td class="bold">Puertas</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td class="bold">NaN €</td>
		</tr>
		<div class="collapse">
			<tr>
				<td class="bold">-</td>
				<td class="bold">Puerta 1</td>
				<td>-</td>
				<td>-</td>
				<td class="bold">NaN €</td>
				<td>-</td>
			</tr>
			<div class="collapse">
				<tr>
					<td class="bold">-</td>
					<td>Pieza 1</td>
					<td>NaN</td>
					<td>NaN €</td>
					<td>NaN €</td>
					<td>-</td>
				</tr>
				<tr>
					<td class="bold">-</td>
					<td>Pieza 2</td>
					<td>NaN</td>
					<td>NaN €</td>
					<td>NaN €</td>
					<td>-</td>
				</tr>
				<tr>
					<td class="bold">-</td>
					<td>Pieza 3</td>
					<td>NaN</td>
					<td>NaN €</td>
					<td>NaN €</td>
					<td>-</td>
				</tr>
			</div>
			<tr>
				<td class="bold">-</td>
				<td class="bold">Puerta 2</td>
				<td>-</td>
				<td>-</td>
				<td class="bold">NaN €</td>
				<td>-</td>
			</tr>
			<div class="collapse">
				<tr>
					<td class="bold">-</td>
					<td>Pieza 1</td>
					<td>NaN</td>
					<td>NaN €</td>
					<td>NaN €</td>
					<td>-</td>
				</tr>
				<tr>
					<td class="bold">-</td>
					<td>Pieza 2</td>
					<td>NaN</td>
					<td>NaN €</td>
					<td>NaN €</td>
					<td>-</td>
				</tr>
			</div>
		</div>
		<!-- MODULOS -->
		<tr>
			<td class="bold">Módulos</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td class="bold">NaN €</td>
		</tr>
		<div class="collapse">
			<tr>
				<td class="bold">-</td>
				<td class="bold">Modulo 1</td>
				<td>-</td>
				<td>-</td>
				<td class="bold">NaN €</td>
				<td>-</td>
			</tr>
			<div class="collapse">
				<tr>
					<td class="bold">-</td>
					<td>Estructura</td>
					<td>NaN</td>
					<td>NaN €</td>
					<td>NaN €</td>
					<td>-</td>
				</tr>
				<tr>
					<td class="bold">-</td>
					<td>Accesorio 1</td>
					<td>NaN</td>
					<td>NaN €</td>
					<td>NaN €</td>
					<td>-</td>
				</tr>
				<tr>
					<td class="bold">-</td>
					<td>Accesorio 2</td>
					<td>NaN</td>
					<td>NaN €</td>
					<td>NaN €</td>
					<td>-</td>
				</tr>
			</div>
			<tr>
				<td class="bold">-</td>
				<td class="bold">Modulo 2</td>
				<td>-</td>
				<td>-</td>
				<td class="bold">NaN €</td>
				<td>-</td>
			</tr>
			<div class="collapse">
				<tr>
					<td class="bold">-</td>
					<td>Estructura</td>
					<td>NaN</td>
					<td>NaN €</td>
					<td>NaN €</td>
					<td>-</td>
				</tr>
				<tr>
					<td class="bold">-</td>
					<td>Accesorio 1</td>
					<td>NaN</td>
					<td>NaN €</td>
					<td>NaN €</td>
					<td>-</td>
				</tr>
				<tr>
					<td class="bold">-</td>
					<td>Accesorio 2</td>
					<td>NaN</td>
					<td>NaN €</td>
					<td>NaN €</td>
					<td>-</td>
				</tr>
			</div>
		</div>
	</tbody>
</table>

