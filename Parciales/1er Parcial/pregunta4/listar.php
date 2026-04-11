<?php
include 'conexion.php';
$sql = "SELECT * FROM LIBROS";

$resultado = $con ->query($sql);

while($fila = $resultado-> fetch_array()){
    echo "<tr>";
    echo "<td> $fila ["titulo"] </td>";
    echo "</tr>";
    
    
};

