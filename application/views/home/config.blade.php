<div id="config" class="section">
@if ($role == 1)
	<div id="admin_functions">
		<h1> Admin Functions </h1>
		Aqui iran las Opciones de administrador
	</div>
	<div id="normal_functions">
@else
	<div id="normal_functions" class="full_wide">
@endif
		<h1> Diseña tu armario</h1>
		Todavia estamos de Pruebas, clicka en el boton da abajo para empezar
		<div id="start-btn" onClick="App.Navigator.buttonConfig();">
		<div class="background">
		</div>
		<div class="desc">Crear Armario</div>
	</div>
		<h1>Tus armarios</h1>
		<ul>
			<?php
				if(isset($wardrobes)){
					foreach($wardrobes as $ele){
						echo "<li><a href=".$ele->id.">".$ele->name.'</a><div class="delete"></div></li>'; 
					}
				} else {
					echo "No hay armarios";
				}
			?>
			
		</ul>
	</div>
</div>
