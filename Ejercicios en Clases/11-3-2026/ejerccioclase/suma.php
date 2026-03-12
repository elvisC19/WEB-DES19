<?php
$suma=0;

foreach($_GET as $valor ){
    $suma+=$valor;
}
echo "La suma es: " . $suma;