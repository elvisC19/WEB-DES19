<?php

session_start();

if(isset($_SESSION['contador'])){
    $_SESSION['contador']+=1;
}else{
    $_SESSION['contador']=1;
}

echo "has visitado esta pagina $contador";