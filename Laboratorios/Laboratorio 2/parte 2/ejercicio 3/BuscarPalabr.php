<?php


$textoBuscador      = "";
$palabraClave       = "";
$totalCoincidencias = 0;
$textoResaltado     = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["texto"]) && isset($_POST["palabra"])) {

    $textoBuscador = $_POST["texto"];
    $palabraClave  = trim($_POST["palabra"]);

    if (strlen($palabraClave) > 0) {

      
        $textoMinusculas   = strtolower($textoBuscador);
        $palabraMinusculas = strtolower($palabraClave);
        $longitud          = strlen($palabraMinusculas);
        $posicion          = 0;
        $textoResaltado    = "";

        while (true) {
           
            $encontrado = strpos($textoMinusculas, $palabraMinusculas, $posicion);

            if ($encontrado === false) {
                
                $textoResaltado .= substr($textoBuscador, $posicion);
                break;
            }

            
            $totalCoincidencias++;

           
            $textoResaltado .= substr($textoBuscador, $posicion, $encontrado - $posicion);

            
            $palabraOriginal = substr($textoBuscador, $encontrado, $longitud);
            $textoResaltado .= "<mark>" . $palabraOriginal . "</mark>";

            
            $posicion = $encontrado + $longitud;
        }
    }
}