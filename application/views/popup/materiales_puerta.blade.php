<div class="content-popup">  
	<div class="close">
		<a id="close2" onClick="popup.closePopup();"><img src="semiems/img/close.png"/></a>
	</div>
	<p id="title_popup">Seleccione el material del modulo/os seleccionado/os</p>
  	<div id="sel_material">
		<div id="sel_parent">
			<ul>
				@if($material["all"] == 1)
				<li><a class='selector' onClick='Tab5Controller.getDoorMaterials(1)'>Cristales porcelanicos</a></li>
				<li><a class='selector' onClick='Tab5Controller.getDoorMaterials(2)'>Gama imaprint</a></li>
				@endif
				<li><a class='selector' onClick='Tab5Controller.getDoorMaterials(3)'>Gama Duo</a></li>
				<li><a class='selector' onClick='Tab5Controller.getDoorMaterials(4)'>Gama Luxe</a></li>
				<li><a class='selector' onClick='Tab5Controller.getDoorMaterials(5)'>Maderas y Lacas</a></li>
			</ul>
		</div>
		<div id="materiales">

		</div>
  	</div>
</div>
