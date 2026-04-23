<?php
session_start();
include('validar_sesion.php');

$nombre = $_POST['nombre'];
$raza = $_POST['raza'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$peso = $_POST['peso'];
$sexo = $_POST['sexo'];
$propietario = $_POST['propietario'];
$especie_id = $_POST['especie_id'];

$nuevo = "";
if (isset($_FILES['fotografia']['tmp_name']) && $_FILES['fotografia']['tmp_name'] != "") {
    $nombre_temporal = $_FILES['fotografia']['tmp_name'];
    $partes = explode(".", $_FILES['fotografia']['name']);
    $nuevo = uniqid() . '.' . end($partes);
    copy($nombre_temporal, "images/" . $nuevo);
}

include('conexion.php');

$sql = "INSERT INTO mascotas (fotografia, nombre, raza, fecha_nacimiento, peso, sexo, propietario, especie_id)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $con->prepare($sql);
$stmt->bind_param( "ssssdssi",$nuevo,$nombre,$raza,$fecha_nacimiento,$peso,$sexo,$propietario,$especie_id
);

if ($stmt->execute()) {
    echo "Registro exitoso";
}
?>
<meta http-equiv="refresh" content="2;url=read.php">