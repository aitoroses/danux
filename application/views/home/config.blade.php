<div id="config" class="row shadow bg">
	@if ($user->roles()->first() != null)
		@if ($user->roles()->first()->name == 'admin')
		<div class="small-12 large-5 large-offset-1 columns">
			<div id="admin_functions">
				<h1> Opciones de administrador </h1>
		        <a class="button" href="{{ action('admin.distributors@index') }}"> Lista de Distribuidores</a>
			</div>
		</div>
		<div class="small-12 large-6 columns">
		@else
		<div class="small-12 large-12 columns">
		@endif
	
	@endif
		<div id="normal_functions">
			<h1> Diseña un armario</h1>
			<p>Para empezar, haz click en el botón:</p>
			<button id="start-btn" onClick="App.Navigator.buttonConfig();WardrobeMenuController.flushWardrobe();">Empezar</button>
			<h1>Historial de armarios</h1>
			@if(isset($wardrobes))
				<table width="100%">
					<thead>
						<th>ID</th>
						<th>Nombre</th>
						<th>Fecha de creación</th>
						<th>Acciones</th>
					</thead>
					<tbody>
						@foreach($wardrobes as $ele)
							<tr>
								<td>{{ $ele->id }}</td>
								<td>{{ '<a wardrobe="'.$ele->id.'" href="1#wardrobe-create" style="text-decoration: underline;" >'.$ele->name.'</a>' }}</td>
								<td>{{ $ele->created_at }}</td>
								<td>
									{{ Form::open('API/wardrobe', 'DELETE', array('style' => 'margin: 0')) }}
									{{ Form::hidden('id', $ele->id) }}
									{{ Form::submit('Borrar', array('style' => 'background: none; border: none; text-decoration: underline; color: #2ba6cb')) }}</td>
									{{ Form::close() }}
									<!-- '<a wardrobe=".$ele->id.">Borrar</a>' -->
							</tr>
						@endforeach
					</tbody>
				</table>
				
			@else
				{{ "<h3>No hay armarios</h3>" }}
			@endif
		</div>
	</div>
</div>
