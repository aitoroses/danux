
<table id='hor-minimalist-b' summary='Presupuesto'>
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
</table>

