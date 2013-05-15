<div id="config" class="row shadow bg">
	<div class="small-12 large-6 columns">
		<div id="admin_functions">
		<h1> Opciones de administrador </h1>
		</div>
		<p>En construcción...</p>
		
	</div>
	<div class="small-12 large-6 columns">
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
