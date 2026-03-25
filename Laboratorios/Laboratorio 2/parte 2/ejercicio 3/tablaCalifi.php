<?php


$estudiantes = [
    "Ana García"   => [8, 7, 9, 6],
    "Luis Pérez"   => [5, 4, 6, 5],
    "María López"  => [10, 9, 8, 10],
    "Carlos Ruiz"  => [6, 7, 5, 8],
    "Sofía Torres" => [3, 4, 5, 4],
];


$promedios = [];

foreach ($estudiantes as $nombre => $calificaciones) {
    $suma = 0;
    foreach ($calificaciones as $nota) {
        $suma = $suma + $nota;
    }
    
    $promedios[$nombre] = $suma / count($calificaciones);
}


$mejorNombre   = "";
$mejorPromedio = -1;

foreach ($promedios as $nombre => $promedio) {
    if ($promedio > $mejorPromedio) {
        $mejorPromedio = $promedio;
        $mejorNombre   = $nombre;
    }
}


$peorNombre   = "";
$peorPromedio = 999;

foreach ($promedios as $nombre => $promedio) {
    if ($promedio < $peorPromedio) {
        $peorPromedio = $promedio;
        $peorNombre   = $nombre;
    }
}