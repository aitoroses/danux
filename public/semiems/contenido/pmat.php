
<div class="content-popup">
  <div class="close"><a href="#" onClick="Close_popup()"><img src="img/close.png"/></a></div>
  <p id="title_popup">Seleccione el material del modulo/os seleccionado/os</p>
  <div id="sel_material">

  <script type="text/javascript">

  function mat_puertas(type_material){
  	
  	$.ajax({
       		type: 'POST',  
            url: 'php/getMatDoor.php',
            data: {
    				"type" : type_material
  				}, 
            success: function(data) {  
                $('#aux').html(data);  
            }  
        })	
  
  }  
  </script>
  <div id="sel_parent">
  <ul>
  <?php
  if($_POST['lisabat']==0){
    echo "<li><a class='selector' href='#' onClick='mat_puertas(1)'>Cristales porcelanicos</a></li>";
    echo "<li><a class='selector' href='#' onClick='mat_puertas(2)'>Gama imaprint</a></li>";
  }
  
  ?>
  <li><a class='selector' href='#' onClick="mat_puertas(3)">Gama Duo</a></li>
  <li><a class='selector' href='#' onClick="mat_puertas(4)">Gama Luxe</a></li>
  <li><a class='selector' href='#' onClick="mat_puertas(5)">Maderas y Lacas</a></li>
  </ul>
  </div>
  </br>
  
  <div id="aux"></div>
  
 </div>          
</div> 
