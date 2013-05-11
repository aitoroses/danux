<div class="content-popup">  
    <p><a onClick="popup.fetch({name: 'modules'});">Atras</a></p>
    <h1>Division del modulo</h1>
    <form id="frmDmod" name="frmDmod" class='text-form'> 
  
    <p>Se va a dividir el modulo en dos modulos distintos</p>
    <p>Debes seleccionar la anchura del modulo de la izquierda: (en milimetros)</p>
    <div class='small-12 large-4 columns'><input name="distancia_doble" type=text></input></div>
    
    <input value="Guardar" class="button" type='submit' onClick="Tab2Controller.cambia_modulo_doble(document.frmDmod.distancia_doble.value)"/>
    </form>
</div>  
