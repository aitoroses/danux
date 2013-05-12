<div id="config" class="row">
	

	<div class="small-12 large-6 columns">
		<div id="admin_functions">
		<h1> Opciones de administrador </h1>
		</div>
		<p>En construcción...</p>
		
	</div>
	<div class="small-12 large-6 columns">
		<div id="normal_functions">
			<h1> Diseña tu armario</h1>
			<p>Todavia estamos de Pruebas, clicka en el boton da abajo para empezar</p>
			<button id="start-btn" onClick="App.Navigator.buttonConfig();">Empezar</button>
			<h1>Historial de armarios</h1>
			<ul>
				<?php
					if(isset($wardrobes)){
						foreach($wardrobes as $ele){
							echo "<li><a href=".'1#wardrobe-create'.">".$ele->name.'</a><div class="delete"></div></li>'; 
						}
					} else {
						echo "No hay armarios";
					}
				?>	
			</ul>
		</div>
	</div>
</div>
