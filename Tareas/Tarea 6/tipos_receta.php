<?php


include "conexion.php";

$sql      = "SELECT id, tiporeceta FROM tiporeceta ORDER BY tiporeceta ASC";
$consulta = mysqli_query($con, $sql);

echo '<option value="">-- Seleccione un tipo --</option>';

while ($fila = mysqli_fetch_array($consulta)) {
    echo '<option value="' . $fila['id'] . '">'
         . $fila['tiporeceta']
         . '</option>';
}

$con->close();
?>