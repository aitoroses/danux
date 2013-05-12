<div class="content-popup">  
    <a onClick="popup.fetch({name: 'modules'});">Atras</a>
    <br>
    <h1>Como deseas dividir el modulo?</h1>
    <form id="frmDmod" name="frmDmod" class='text-form'> 
    <input value="Asimetrico" class='button' onClick="popup.fetch({name:'divisioninterior', data: Tab2Controller.anchuratemporal()})"/>
    <input value="Simetrico" class='button' onClick="Tab2Controller.cambia_modulo_doble_simetrico()"/>
    </form>
</div>  