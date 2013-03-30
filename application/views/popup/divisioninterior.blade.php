<div class="content-popup">   
    <div class="close">
        <a href="#" id="close2" onClick="popup.closePopup();"><img src="semiems/img/close.png"/></a>
        <a href="#" onClick="popup.fetch({name: 'modules'});"><img src="semiems/img/back.png"/></a>
    </div>
    <p id="title_popup">Opciones de modulo doble</p>
    <form id="frmDmod" name="frmDmod" class='text-form'> 
    Tipo de Modulo:
    <select class="select" name="inumero_div"> 
    	<option value=0>Simple</option>
    	<option value=1>Doble</option>
    </select>
    <br/>
    <br/>
    <div class="optional" style="display:none;">
        Especifica la distancia mas corta:
        <input name="distancia_doble" class='form-field' type=text></input>
    </div>
    <input value="Guardar" class='submit-button' onClick="cambia_modulo_doble(document.frmDmod.inumero_div.value,document.frmDmod.distancia_doble.value)"/>
    </form>
    <script type="text/javascript">
        optionalMenu();
    </script>
</div>