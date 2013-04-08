
<div class="content-popup">
         <div class="close">
            <a href="#" id="close2" onClick="popup.closePopup();"><img src="semiems/img/close.png"/></a>
            <a href="#" onClick="popup.fetch({name: 'modules'})"><img src="semiems/img/back.png"/></a>
        </div>  
        <p id="title_popup">Tipos de interior</p>
  <div id="sel_interiores">
    <div class="content"> 
        @foreach($modules as $module)
            <div class='element selectormat' data-ref="{{ $module->id }}">
              <div class='picture'>
                <img src="{{ 'semiems/'.$module->image.'/'.$module->id.'.png' }}" ref="{{$module->id}}"/>
              </div> 
              <div class='title'>
                Ref."{{$module->id}}"
              </div>
            </div>
        @endforeach

    </div>
 </div>          
</div> 