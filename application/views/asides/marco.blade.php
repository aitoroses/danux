            @if($marco["marco"]==0)
            	Por favor, seleccione un material para el marco.
            @else 
            	Has seleccionado el material {{ $marco["data"]->ref.'/'.$marco["data"]->desc }} para el marco. 
            	<img src="semiems/contenido/Bibliotecas/mat_puertas/{{ $marco['folder'].'/'.$marco['data']->image }}" />
            @endif