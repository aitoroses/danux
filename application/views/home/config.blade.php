<div id="config" class="row shadow bg">
	@if ($user->roles()->first() != null)
		@if ($user->roles()->first()->name == 'admin')
		<div class="small-12 large-5 large-offset-1 columns">
			<div id="admin_functions">
				<h1> Opciones de administrador </h1>
		        <a class="button" href="{{ action('admin.distributors@index') }}"> Lista de Distribuidores</a>
		        <a class="button" href="{{ action('admin.users@index') }}"> Lista de Usuarios</a>
		        <a class="button" href="{{ action('admin.materials@index') }}"> Lista de Materiales</a>
			</div>
		</div>
	<div class="small-12 large-6 columns">
		@endif
	@else
	<div class="small-12 large-12 columns">
	@endif
		<div id="normal_functions">
			<h1> Diseña tu armario</h1>
			<p>Para empezar, haz click en el botón:</p>
			<button id="start-btn" onClick="App.Navigator.buttonConfig();WardrobeMenuController.flushWardrobe();">Empezar</button>
			<h1>Historial de armarios</h1>
			<ul id="wardrobemenu">
				<?php
					if(isset($wardrobes)){
						foreach($wardrobes as $ele){
							echo "<li><a wardrobe=".$ele->id." href=".'1#wardrobe-create'.">".$ele->name.'</a><div class="delete"></div></li>'; 
						}
					} else {
						echo "No hay armarios";
					}
				?>	
			</ul>
		</div>
	</div>
</div>
