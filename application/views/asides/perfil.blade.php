@if($perfil["tperfil"]==0)
	Por favor, seleccione un perfil.
@elseif($perfil["tperfil"]!=0 && $perfil["acabado"]!=NULL) 
	Has seleccionado el perfil {{ $perfil["name"] }}. Con el acabado {{ $perfil["acabado"] }}
@else
	Has seleccionado el perfil {{ $perfil["name"] }}
@endif