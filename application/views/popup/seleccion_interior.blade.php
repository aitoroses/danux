
<div class="content-popup">
         <div class="close">
            <a href="#" id="close2" onClick="popup.closePopup();"><img src="semiems/img/close.png"/></a>
            <a href="#" onClick="popup.fetch('modules')"><img src="semiems/img/back.png"/></a>
        </div>  
        <p id="title_popup">Tipos de interior</p>
  <div id="sel_interiores">
		<ul>

        @foreach($list as $li)
            {{$li}}
        @endforeach
		
		</ul>
 </div>          
</div> 