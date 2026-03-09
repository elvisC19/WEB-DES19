<?php

$n = $_POST["n"];

$operacion = $_POST["operacion"];

include "factorial.php";
include "fibonacci.php";
switch($operacion)
{
    case "fatorial":
        echo "El fatorial es:" .factorial($n);
    Break;
    case "fibonacci":
        echo "El fibonacci es:" .fibonacci($n);
    Break;
        
}
