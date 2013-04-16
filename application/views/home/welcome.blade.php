<div id="config">
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
	<div id="start-btn" onClick="App.Navigator.buttonConfig();"><div class="background"></div><div class="desc">Crear Armario</div></div>
	</div>
</div>
