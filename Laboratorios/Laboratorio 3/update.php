<?php
session_start();
include('validar_sesion.php');

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$raza = $_POST['raza'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$peso = $_POST['peso'];
$sexo = $_POST['sexo'];
$propietario = $_POST['propietario'];
$especie_id = $_POST['especie_id'];


$nuevo = $_POST['fotografia_actual'];
if (isset($_FILES['fotografia']['tmp_name']) && $_FILES['fotografia']['tmp_name'] != "") {
    $nombre_temporal = $_FILES['fotografia']['tmp_name'];
    $partes = explode(".", $_FILES['fotografia']['name']);
    $nuevo = uniqid() . '.' . end($partes);
    copy($nombre_temporal, "images/" . $nuevo);
}

include('conexion.php');

$sql = "UPDATE mascotas SET fotografia=?, nombre=?, raza=?, fecha_nacimiento=?, 
        peso=?, sexo=?, propietario=?, especie_id=?
        WHERE id=?";
$stmt = $con->prepare($sql);
$stmt->bind_param(
    "ssssdssii",
    $nuevo,
    $nombre,
    $raza,
    $fecha_nacimiento,
    $peso,
    $sexo,
    $propietario,
    $especie_id,
    $id
);

if ($stmt->execute()) {
    echo "Actualización exitosa";
}
?>
<meta http-equiv="refresh" content="2;url=read.php">