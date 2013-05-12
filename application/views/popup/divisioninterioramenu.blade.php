<div class="content-popup">  
<div class="close">
        <a id="close2" onClick="popup.closePopup();"><img src="semiems/img/close.png"/></a>
        <a onClick="popup.fetch({name: 'modules'});"><img src="semiems/img/back.png"/></a>
</div>
    <p id="title_popup">Opciones de modulo doble</p>
    <form id="frmDmod" name="frmDmod" class='text-form'> 
    <input value="Asimetrico" class='submit-button' onClick="popup.fetch({name:'divisioninterior', data: Tab2Controller.anchuratemporal()})"/>
    <input value="Simetrico" class='submit-button' onClick="Tab2Controller.cambia_modulo_doble_simetrico()"/>
    </form>
</div>  