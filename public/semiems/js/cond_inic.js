//Calcular numero de puertas


   function addOpt(oCntrl, iPos, sTxt, sVal){ 
     var selOpcion=new Option(sTxt, sVal); 
     eval(oCntrl.options[iPos]=selOpcion); 
   } 
 
   function calculo_puertas(oCntrl){ 

    while (oCntrl.length) oCntrl.remove(0); 
    switch (document.frm.puerta.selectedIndex){ 
     case 0:
     	$('#type').text('puertas');
	 	break;
	 case 1:
	 	$('#type').text('modulos');
	 	break;  
     case 2:
	 	$('#type').text('puertas');
	 if (document.frm.mancho.value < 300)
	 {
		 addOpt(oCntrl,  0, "Imposible", 0);
		 break;
	 }
		 
	 var i = 1;
		var npuertasmin = 1;
		var npuertasmax = 1;
		var x=1;
		while(x!=0)
			{
				var mpuerta = document.frm.mancho.value/i;
				if (mpuerta >650){ npuertasmin = npuertasmin +1; }
				else if (mpuerta <= 650 && mpuerta >= 300 ) { npuertasmax = i; }
				else if (mpuerta < 300) {x=0;}
				i++;
			}
		var np = npuertasmax-npuertasmin+1;	
	   for (var z=0;z<np;z++)
			{
				addOpt(oCntrl,  z, z+npuertasmin, z+npuertasmin); 
			}
      puertas_impares_bat()
	  break; 
     case 3: 
	 $('#type').text('puertas');

	  if (document.frm.mancho.value < 600)
	 {
		 addOpt(oCntrl,  0, "Imposible", 0);
		 break;
	 }
	 
	 var i = 2;
		var npuertasmin = 2;
		var npuertasmax = 2;
		var x=1;
		while(x!=0)
			{
				var mpuerta = document.frm.mancho.value/i;
				if (mpuerta >1200){ npuertasmin = npuertasmin +1; }
				else if (mpuerta <= 1200 && mpuerta >= 600 ) { npuertasmax = i; }
				else if (mpuerta < 600) {x=0;}
				i++;
			}
		var np = npuertasmax-npuertasmin+1;	
	   for (var z=0;z<np;z++)
			{
				addOpt(oCntrl,  z, z+npuertasmin, z+npuertasmin); 
			}
	  puertas_impares_bat()
      break; 
    } 
   } 
   //Ahora si son impares y batientes
   function puertas_impares_bat(){
		document.getElementById("puertas_imp_bat").innerHTML=""; //limpia el div
	    if (document.frm.npuertas.value%2!=0 && document.frm.puerta.value == 1){
  			var parent = document.getElementById('puertas_imp_bat');
			parent.innerHTML="Posicion puerta impar:<select name='donde_imp'></select>";  // <div>texto<button onclick=\"adddiv('d_" + a + "')\">Agregar division</button><div id='d_" + a + "'></div></div>
			var ind=0;
			var limite = parseInt(document.frm.npuertas.value)+1;
			for (var zz=0;zz< limite;zz++){
				if (zz%2!=0){
						addOpt(document.frm.donde_imp,  ind, zz, zz);
						ind++;
					}
				}
		}
   }
