<div class="content-popup">  
<div class="close">
        <a id="close2" onClick="popup.closePopup();"><img src="semiems/img/close.png"/></a>
        <a onClick="popup.fetch({name:'menuasimetricosimetrico'});"><img src="semiems/img/back.png"/></a>
</div>
    <p id="title_popup">Opciones de modulo doble</p>
    <form id="frmDmod" name="frmDmod" class='text-form'> 
    
    <div>
        El modulo elegido tiene {{ $anchuratemp }} mm,
        distancia a la que colocar la division:
        <div id="contdiv">
            <div  id="divinput" style="display:none;"><input id="txt_input" name="distancia_doble" type=text style=' width: 23px; display: hidden;' onkeyup ='division.onMouseOverFixed(this)'></input> mm</div>
        </div>
        <input  id="txt_input" name="distancia_doble" class='form-field' type=text></input>
    </div>
    <input value="Guardar" class='submit-button' onClick="Tab2Controller.cambia_modulo_doble(document.frmDmod.distancia_doble.value)"/>
    </form>
</div>  

<script>
  $(document).ready(function(){
    division.initialize(380,250,'contdiv');
    division.background.on('mousemove', function() {
      division.onMouseOver();
    });

  });
</script>
