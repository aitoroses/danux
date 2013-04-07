
<div class="content-popup">
         <div class="close">
            <a href="#" id="close2" onClick="popup.closePopup();"><img src="semiems/img/close.png"/></a>
            <a href="#" onClick="popup.fetch({name: 'modules'})"><img src="semiems/img/back.png"/></a>
        </div>  
        <p id="title_popup">Tipos de interior</p>
  <div id="sel_interiores">
		<ul>
        @foreach($modules as $module)
            <li>
            <a href='#'>
            <div class='item'>
            <img src="{{ 'semiems/'.$module->image.'/'.$module->id.'.png' }}" ref="{{$module->id}}" />
            <div class='title'>Ref."{{$module->id}}"
            </div>
            </div>
            </a>
            </li>
        @endforeach
		</ul>
 </div>          
</div> 