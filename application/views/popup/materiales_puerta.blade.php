<div class="content-popup">  
	<h1>Seleccione un material para su selección</h1>
  	<div id="sel_material">
		<div id="sel_parent">
			<ul class="small-block-grid-2 large-block-grid-5">
				@if($material["all"] == 1)
				<li><a class='selector button' onClick='Tab5Controller.getDoorMaterials(1)'>Cristales porcelanicos</a></li>
				<li><a class='selector button' onClick='Tab5Controller.getDoorMaterials(2)'>Gama imaprint</a></li>
				@endif
				<li><a class='selector button' onClick='Tab5Controller.getDoorMaterials(3)'>Gama Duo</a></li>
				<li><a class='selector button' onClick='Tab5Controller.getDoorMaterials(4)'>Gama Luxe</a></li>
				<li><a class='selector button' onClick='Tab5Controller.getDoorMaterials(5)'>Maderas y Lacas</a></li>
			</ul>
		</div>
		<div id="materiales">

		</div>
  	</div>
</div>
