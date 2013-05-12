<div class="content-popup">  
    <p><a onClick="popup.fetch({name:'menuasimetricosimetrico'});">Atras</a></p>
    <h1>Division del modulo</h1>  
    <p>Se va a dividir el modulo en dos modulos distintos</p>
    <p>El modulo elegido tiene {{ $anchuratemp }} mm,distancia a la que colocar la division:</p>
    <div id="contdiv"></div>
    <div  id="divinput" style="display:none;">
        <input id="txt_input" name="distancia_doble" type=text style=' width: 29px; display: hidden;' onkeyup ='division.onMouseOverFixed(this)'></input> mm
    </div>
    <input value="Guardar" class="button" type='submit' onClick="Tab2Controller.cambia_modulo_doble(document.getElementById('txt_input').value)"/>
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
