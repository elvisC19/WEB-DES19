<?php
session_start();
include('validar_sesion.php');
include('conexion.php');

$id = $_GET['id'];


$sql_foto = "SELECT fotografia FROM mascotas WHERE id=?";
$stmt_foto = $con->prepare($sql_foto);
$stmt_foto->bind_param("i", $id);
$stmt_foto->execute();
$resultado = $stmt_foto->get_result();
$mascota = mysqli_fetch_array($resultado);


$sql = "DELETE FROM mascotas WHERE id=?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    
    if ($mascota['fotografia'] != '' && file_exists("images/" . $mascota['fotografia'])) {
        unlink("images/" . $mascota['fotografia']);
    }
    echo "Se eliminó el registro";
}
?>
<meta http-equiv="refresh" content="2;url=read.php">