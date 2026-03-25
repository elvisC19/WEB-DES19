<?php

if(isset($_COOKIE['contador'])){
    $contador = $_COOKIE['contador']+1;

}else{
    $contador =1;

}

setcookie('contador',$contador,time()+3600);
echo "Has visitado esta pagina $contador veces";
?>