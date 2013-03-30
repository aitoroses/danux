<div class="content-popup">
  <div class="close">
    <a href="#" id="close2" onClick="popup.closePopup();"><img src="semiems/img/close.png"/></a>
    <a href="#" onClick="popup.fetch({name: 'accesorios_modulo'})"><img src="semiems/img/back.png"/></a>
  </div>
  
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