<div class="content-popup">  
<div class="close">
        <a href="#" id="close2" onClick="popup.closePopup();"><img src="semiems/img/close.png"/></a>
        <a href="#" onClick="popup.fetch({name: 'modules'});"><img src="semiems/img/back.png"/></a>
</div>
    <p id="title_popup">Opciones de modulo doble</p>
    <form id="frmDmod" name="frmDmod" class='text-form'> 
    
    <div>
        Especifica la distancia mas corta:
        <input name="distancia_doble" class='form-field' type=text></input>
    </div>
    <input value="Guardar" class='submit-button' onClick="Tab2Controller.cambia_modulo_doble(document.frmDmod.distancia_doble.value)"/>
    </form>
</div>  
