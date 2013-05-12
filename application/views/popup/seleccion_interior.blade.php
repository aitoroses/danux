
<div class="content-popup">
  <a onClick="popup.fetch({name: 'modules'})">Atras...</a>
  <h1 id="title_popup">Distribuciones interiores posibles:</h1>
  <div id="sel_interiores">
    <div class="content">
      <ul class="small-block-grid-2 large-block-grid-11">
        @foreach($modules as $module)
        <!-- Using both block grids together for different layouts -->
            
          <li style="border: 1px solid #333">
          
            <div class='element selectormat' data-ref="{{ $module->id }}">
              <div class='picture'>
                <img style="border: 1px solid rgba(0,0,0,0.4)" src="{{ 'semiems/'.$module->image.'/'.$module->id.'.png' }}" ref="{{$module->id}}"/>
              </div> 
              <div class='title'>
                Ref."{{$module->id}}"
              </div>
            </div>

          </li>
        @endforeach
      </ul>

    </div>
 </div>          
</div> 