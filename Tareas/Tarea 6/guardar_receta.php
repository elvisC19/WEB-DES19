<?php


include "conexion.php";

$titulo      = $_POST['titulo'];
$tipo        = $_POST['tipo'];
$preparacion = $_POST['preparacion'];
$imagen      = $_POST['imagen'];

if ($imagen == '') {
    $imagen = 'default.jpg';
}

if (isset($_FILES['imagenFile']) && $_FILES['imagenFile']['error'] == 0) {

    $extension  = pathinfo($_FILES['imagenFile']['name'], PATHINFO_EXTENSION);
    $nombreFile = 'receta_' . time() . '.' . $extension;

    move_uploaded_file($_FILES['imagenFile']['tmp_name'], 'images/' . $nombreFile);

    $imagen = $nombreFile;
}


$sql = "INSERT INTO recetas (titulo, idtiporeceta, preparacion, fotografia)
        VALUES ('$titulo', '$tipo', '$preparacion', '$imagen')";

$ok = mysqli_query($con, $sql);

if ($ok) {
    echo 'Receta guardada correctamente.';
} else {
    echo 'Error al guardar: ' . mysqli_error($con);
}

$con->close();
?>