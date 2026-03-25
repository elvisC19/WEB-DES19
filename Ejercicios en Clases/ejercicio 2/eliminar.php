<?php

session_start();

if(isset($_SESSION["p"])){
    $pila=$_SESSION["p"];
}else{  
    unset($_SESSION["pila"]);
    echo "Pila eliminada";
}

