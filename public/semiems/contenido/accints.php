
<div class="content-popup">
  <div class="close"><a href="#" onClick="Close_popup()"><img src="img/close.png"/></a></div>
  <p id="title_popup">Seleccione el material del modulo/os seleccionado/os</p>
  <div id="sel_material">

  <script type="text/javascript">

  function acc_int(type_material){
  	
  	$.ajax({
       		type: 'POST',  
            url: 'php/getAccInts.php',
            data: {
    				"type" : type_material
  				}, 
            success: function(data) {  
                $('#aux').html(data);  
            }  
        })	
  
  }  
  acc_int(1)
  </script>
  <div id="sel_parent">
  <ul>
  <li><a class='selector' href='#' onClick="acc_int(1)">Loija</a></li>
  </ul>
  </div>
  </br>
  
  <div id="aux"></div>
  
 </div>          
</div> 
