<?php
    $directory="accesoriosLoija";
    $dirint = dir($directory);
    
    //$sql="INSERT INTO `semiems`.`b_mat_puertas` (`id`, `type`, `ref`, `desc`, `image`) VALUES";
    $b="";
    echo $sql;
    while (($archivo = $dirint->read()) !== false)
    {
        if (eregi("gif", $archivo) || eregi("jpg", $archivo) || eregi("png", $archivo)){

            $b="'".$archivo."'</br>";
            echo $b;
        }
    }
    $dirint->close();
    

?>



