//Document ready
$(document).ready(function(){
	$('a.next-tab').on('click',function(e){
		//e.preventDefault();     
        if($("body").data('wardrobe')==""){
        	WardrobeModel.initialize();
        	WardrobeModel.guardarJson();
        }else{
        	//WardrobeModel.initialize();
        	WardrobeModel.rebuildData();
        	WardrobeModel.save();
        }
        
	});

	App.History.saveWardrobe();

	if($("body").data('wardrobe')!=""){
		$(document).bind('sync',function(){
			wardrobe=WardrobeModel.getWardrobe();
	        document.frm.name.value = wardrobe.data.name;
	        document.frm.malto.value = wardrobe.data.height;
	        document.frm.mancho.value = wardrobe.data.width;
	        document.frm.mprof.value = wardrobe.data.prof;
	        document.frm.puerta.value = wardrobe.data.typedoor;
	        calculo_puertas(document.frm.npuertas);
	        document.frm.npuertas.value = wardrobe.data.doors;
	        puertas_impares_bat();
	        if (document.frm.npuertas.value%2!=0 && document.frm.puerta.value == 1){
	        document.frm.donde_imp.value = wardrobe.data.paritypos;
	        }
		});
		WardrobeModel.fetch();
	}
	//Evento para el guardado
	$(document).bind('sync_save', function(){
			App.Navigator.goNext();
	})

});

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
// 
	case 1:
		$('#type').text('modulos');
		var anchura_min_puerta = 600;
		var anchura_max_puerta = 1200;
		
		if (document.frm.mancho.value < anchura_min_puerta)
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
			if (mpuerta >anchura_max_puerta){ npuertasmin = npuertasmin +1; }
			else if (mpuerta <= anchura_max_puerta && mpuerta >= anchura_min_puerta ) { npuertasmax = i; }
			else if (mpuerta < anchura_min_puerta) {x=0;}
			i++;
		}
		var np = npuertasmax-npuertasmin+1;	
		for (var z=0;z<np;z++)
		{
			addOpt(oCntrl,  z, z+npuertasmin, z+npuertasmin); 
		}
		puertas_impares_bat()
		break; 
	// Si son Batientes minimo 2 puertas por modulo, y una puerta sola
    case 2:
	 	$('#type').text('puertas');
	 	var anchura_min_puerta = 300;
		var anchura_max_puerta = 600;

		if (document.frm.mancho.value < anchura_min_puerta)
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
			if (mpuerta >anchura_max_puerta){ npuertasmin = npuertasmin +1; }
			else if (mpuerta <= anchura_max_puerta && mpuerta >= anchura_min_puerta ) { npuertasmax = i; }
			else if (mpuerta < anchura_min_puerta) {x=0;}
			i++;
		}
		var np = npuertasmax-npuertasmin+1;	
		for (var z=0;z<np;z++)
		{
			addOpt(oCntrl,  z, z+npuertasmin, z+npuertasmin); 
		}
		puertas_impares_bat()
		break; 
	// Si son correderas minimo 1 puerta por modulo
    case 3: 
    	$('#type').text('puertas');
		var anchura_min_puerta = 600;
		var anchura_max_puerta = 1200;
		if (document.frm.mancho.value < anchura_min_puerta)
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
			if (mpuerta >anchura_max_puerta){ npuertasmin = npuertasmin +1; }
			else if (mpuerta <= anchura_max_puerta && mpuerta >= anchura_min_puerta ) { npuertasmax = i; }
			else if (mpuerta < anchura_min_puerta) {x=0;}
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
		parent.innerHTML="Posicion puerta impar:<select name='donde_imp' data-intro ='Posicion de la puerta individual.' data-position='right'></select>";  // <div>texto<button onclick=\"adddiv('d_" + a + "')\">Agregar division</button><div id='d_" + a + "'></div></div>
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

// Validacion de campos en tiempo real

var validate_real = function(context){
	$context = $(context);
	// Array of heights
	var heights_to_validate = [ {name: 'malto', min: 500, max: 3000 },
								{name: 'mancho', min: 500, max: 5000 },
								{name: 'mprof', min: 500, max: 680 }
								 ];
	// Heights check
	var check_limits = function(height) {
		// Checks
		if(height.from_context === ""){
			return {status: false, message: "Hay que rellenar este campo"};
		} else if(isNaN(height.from_context)){
			return {status: false, message: "Solo se permiten números"};
		} else if (height.from_context < height.min) {
			return {status: false, message: "La medida es inferior al mínimo (" + height.min + "mm)"};
		} else if (height.from_context > height.max) {
			return {status: false, message: "La medida es superior al máximo (" + height.max + "mm)"};
		} else {
			return {status: true, message: "Correcto"};
		}
	}
	// Callback
	var callback = function(height) {
		// Get numeric value or empty string
		height.from_context = (function(){
			if($context.val() !== "") {
				return parseInt($context.val())
			} else {
				return $context.val();
			}
		}).call();
		// Logging info
		var logger = function() {
			console.log('Attribute ' + height.name + ' changed to ' + $context.val());
		}
		
		//**************************************
		// Validation happens
		var result;
		if($context.attr('name') === height.name) {
			logger();
			result = check_limits(height);
			console.log(result);
			// If there is a result
			if (result !== null) {
				if(result.status === true) {
					$context.css({background: 'rgba(124, 255, 95, 0.62)'});
				} else {
					$context.css({background: 'rgba(255, 49, 37, 0.35)'});
				}
				$context.parent().find('.message').text(result.message);
			}
		}

		
	}
	// Iterate over heights
	heights_to_validate.forEach(callback, this);
}
