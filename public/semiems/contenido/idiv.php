    <div class="content-popup">
        
        <div class="close">
            <a href="#" id="close2" onClick="Close_popup();"><img src="img/close.png"/></a>
            <a href="#" onClick="pop_up('modules')"><img src="img/back.png"/></a>
        </div>

        <p id="title_popup">Opciones de modulo doble</p>
        <form id="frmDmod" name="frmDmod" class='text-form'> 
        Tipo de Modulo:
        <select name="inumero_div"> 
        	<option value=0>Simple</option>
        	<option value=1>Doble</option>
        </select>
        <br/>
        <br/>
        Si es doble especifica la distancia mas corta:
        <input name="distancia_doble" class='form-field' type=text></input>
        <input value="Guardar" class='submit-button' onClick="idiv_cambio(document.frmDmod.inumero_div.value,document.frmDmod.distancia_doble.value)"/>
        </form>       
    </div>