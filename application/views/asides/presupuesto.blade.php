
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

.under {
	border-bottom: 1px dashed #888;
}

.off{
	position: relative;
	right: 25px;
}
</style>


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
			<td class="bold">
				<i class="icon-caret-right"></i>
				Armazón
			</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<div>
			<tr>
				<td class="bold">&nbsp;</td>
				<td>Pieza 1</td>
				<td>NaN</td>
				<td>NaN €</td>
				<td>NaN €</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td class="bold">&nbsp;</td>
				<td>Pieza 2</td>
				<td>NaN</td>
				<td>NaN €</td>
				<td>NaN €</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td class="bold">&nbsp;</td>
				<td>Pieza 3</td>
				<td>NaN</td>
				<td>NaN €</td>
				<td>NaN €</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td class="bold">NaN €</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
		</div>
	</tbody>
	<tbody>
		<!-- PUERTAS -->
		<tr>
			<td class="bold">
				<i class="icon-caret-right"></i>
				Puertas
			</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<div>
			<tr>
				<td class="bold">&nbsp;</td>
				<td class="bold off">
					<i class="icon-caret-right"></i>
					Puerta 1
				</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<div>
				<tr>
					<td>&nbsp;</td>
					<td>Pieza 1</td>
					<td>NaN</td>
					<td>NaN €</td>
					<td>NaN €</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td class="bold">&nbsp;</td>
					<td>Pieza 2</td>
					<td>NaN</td>
					<td>NaN €</td>
					<td>NaN €</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td class="bold">&nbsp;</td>
					<td>Pieza 3</td>
					<td>NaN</td>
					<td>NaN €</td>
					<td>NaN €</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td class="bold">NaN €</td>
					<td>&nbsp;</td>
				</tr>
			</div>
			<tr>
				<td class="bold">&nbsp;</td>
				<td class="bold off">
					<i class="icon-caret-right"></i>
					Puerta 2
				</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<div>
				<tr>
					<td class="bold">&nbsp;</td>
					<td>Pieza 1</td>
					<td>NaN</td>
					<td>NaN €</td>
					<td>NaN €</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td class="bold">&nbsp;</td>
					<td>Pieza 2</td>
					<td>NaN</td>
					<td>NaN €</td>
					<td>NaN €</td>
					<td>&nbsp;</td>
				</tr>
			</div>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td class="bold">NaN €</td>
				<td>&nbsp;</td>

			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td class="bold">NaN €</td>
			</tr>
		</div>
		<!-- MODULOS -->
		<tr>
			<td class="bold">
				<i class="icon-caret-right"></i>
				Módulos
			</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<div>
			<tr>
				<td>&nbsp;</td>
				<td class="bold off">
					<i class="icon-caret-right"></i>
					Modulo 1
				</td>				
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<div>
				<tr>
					<td class="bold">&nbsp;</td>
					<td>Estructura</td>
					<td>NaN</td>
					<td>NaN €</td>
					<td>NaN €</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td class="bold">&nbsp;</td>
					<td>Accesorio 1</td>
					<td>NaN</td>
					<td>NaN €</td>
					<td>NaN €</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td class="bold">&nbsp;</td>
					<td>Accesorio 2</td>
					<td>NaN</td>
					<td>NaN €</td>
					<td>NaN €</td>
					<td>&nbsp;</td>
				</tr>
			</div>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td class="bold">NaN €</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td class="bold off">
					<i class="icon-caret-right"></i>
					Modulo 2
				</td>				
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<div>
				<tr>
					<td class="bold">&nbsp;</td>
					<td>Estructura</td>
					<td>NaN</td>
					<td>NaN €</td>
					<td>NaN €</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td class="bold">&nbsp;</td>
					<td>Accesorio 1</td>
					<td>NaN</td>
					<td>NaN €</td>
					<td>NaN €</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td class="bold">&nbsp;</td>
					<td>Accesorio 2</td>
					<td>NaN</td>
					<td>NaN €</td>
					<td>NaN €</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td class="bold">NaN €</td>
					<td>&nbsp;</td>
				</tr>
			</div>
			<tr class="under">
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td class="bold">NaN €</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td class="bold">Importe total</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td class="bold">NaN €</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
		</div>
	</tbody>
</table>

