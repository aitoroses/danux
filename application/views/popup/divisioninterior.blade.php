<div class="content-popup">  
<div class="close">
        <a id="close2" onClick="popup.closePopup();"><img src="semiems/img/close.png"/></a>
        <a onClick="popup.fetch({name:'menuasimetricosimetrico'});"><img src="semiems/img/back.png"/></a>
</div>
    <p id="title_popup">Opciones de modulo doble</p>
    
    
    <div>
        El modulo elegido tiene {{ $anchuratemp }} mm,
        distancia a la que colocar la division:
        <div id="contdiv">
        </div>
        <div  id="divinput" style="display:none;">
            <input id="txt_input" name="distancia_doble" type=text style=' width: 29px; display: hidden;' onkeyup ='division.onMouseOverFixed(this)'>
            </input> mm
        </div>
    </div>
    <input value="Guardar" class='submit-button' onClick="Tab2Controller.cambia_modulo_doble(document.getElementById('txt_input').value)"/>
    </form>
</div>  

<script>
  $(document).ready(function(){
    division.initialize(200,250,'contdiv',30,Tab2Controller.anchuratemporal());
    division.background.on('mousemove', function() {
      division.onMouseOver();
    });
    division.background.on('click', function() {
      Tab2Controller.cambia_modulo_doble(document.getElementById('txt_input').value);
    });

  });
</script>
