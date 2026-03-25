<?php


$nombres      = [];
$totalNombres = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nombres"])) {

    $cadena = $_POST["nombres"];

   
    $partes = explode(",", $cadena);

    foreach ($partes as $nombre) {


        $nombre = trim($nombre);

       
        $nombre = ucwords(strtolower($nombre));

        
        if (strlen($nombre) > 0) {
            $nombres[] = $nombre;
        }
    }

   
    $totalNombres = count($nombres);
}