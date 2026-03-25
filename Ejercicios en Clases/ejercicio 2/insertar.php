<?php

include("pila.php");

session_start();
$elemento=$_GET["elemento"];
if(!isset ($_SESSION["pila"])){
    $_SESSION["pila"]=new Pila();
}else{
    $pila=$_SESSION["pila"];
}           