
            @if($marco["marco"]==0)
            	<h2>Por favor, seleccione un material para el marco.</h2>
            @else 
            	<h2>Has seleccionado el material {{ $marco["data"]->ref.'/'.$marco["data"]->desc }} para el marco. </h2>
            	<img src="semiems/contenido/Bibliotecas/mat_puertas/{{ $marco['folder'].'/'.$marco['data']->image }}" />
            @endif