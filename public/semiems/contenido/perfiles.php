    <?php
    $typedoor=$_POST["type"];
    $a='';
    if($typedoor==0){

        $a="<div id='sel_parent'>
    <ul>
    <li><a class='selector' href='#' onClick='get_perfiles(1)'>Minimalista</a></li>
    <li><a class='selector' href='#' onClick='get_perfiles(2)'>Clasico</a></li>
    </ul>
    </div>";

    }else{
        $a="<div id='sel_parent'>
    <ul>
    <li><a class='selector' href='#' onClick='get_perfiles(3)'>Lisas</a></li>
    <li><a class='selector'href='#' onClick='get_perfiles(4)'>Con perfil</a></li>
    </ul>
    </div>";
    }
    ?>  
    <div class="content-popup">
        
        <div class="close">
            <a href="#" id="close2" onClick="Close_popup();"><img src="img/close.png"/></a>
        </div>
        <p id="title_popup">Seleccione el perfil</p>
        <div id='perfiles'>
            <? echo $a; ?>
        

        </div>
        
    </div>
