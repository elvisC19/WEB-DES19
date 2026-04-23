<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte por Especie y Sexo</title>
    <style>
        table { border-collapse: collapse; width: 50%; margin-bottom: 30px; }
        th, td { border: 1px solid black; padding: 8px 14px; }
        th { background-color: #1a6bb5; color: white; }
        tr.par   { background-color: #d9d9d9; }
        tr.impar { background-color: #ffffff; }
        td.total-general { font-weight: bold; background-color: #c0d8f5; }
    </style>
</head>
<body>

<?php
session_start();
include('validar_sesion.php');
include('conexion.php');


$iconos = array(
    'Perro'   => '🐶', 'Gato'    => '🐱','Ave'     => '🐦','Peces'  => '🐠','Anfibios'  => '🦎'
);
?>

<h2>Reporte de Mascotas por Especie</h2>


<table>
    <tr>
        <th>Icono</th>
        <th>Especie</th>
        <th>Total Mascotas</th>
    </tr>
    <?php
    $sql = "SELECT e.nombre, COUNT(m.id) AS total
            FROM especies e
            LEFT JOIN mascotas m ON m.especie_id = e.id
            GROUP BY e.id";
    $consulta = mysqli_query($con, $sql);
    $total_general = 0;
    $fila_num = 1;

    while ($fila = mysqli_fetch_array($consulta)) {
        $total_general += $fila['total'];
        $icono = isset($iconos[$fila['nombre']]) ? $iconos[$fila['nombre']] : '🐾';
        $clase = ($fila_num % 2 == 0) ? "par" : "impar";
    ?>
    <tr class="<?php echo $clase; ?>">
        <td><?php echo $icono; ?></td>
        <td><?php echo $fila['nombre']; ?></td>
        <td><?php echo $fila['total']; ?></td>
    </tr>
    <?php $fila_num++; } ?>
    <tr>
        <td colspan="2" class="total-general">TOTAL GENERAL</td>
        <td class="total-general"><?php echo $total_general; ?></td>
    </tr>
</table>


<h2>Reporte de Mascotas por Sexo</h2>

<table>
    <tr>
        <th>Icono</th>
        <th>Sexo</th>
        <th>Total</th>
    </tr>
    <?php
    $sql2 = "SELECT sexo, COUNT(id) AS total FROM mascotas GROUP BY sexo";
    $consulta2 = mysqli_query($con, $sql2);

    $total_machos  = 0;
    $total_hembras = 0;

    while ($fila2 = mysqli_fetch_array($consulta2)) {
        if ($fila2['sexo'] == 'M') $total_machos  = $fila2['total'];
        if ($fila2['sexo'] == 'H') $total_hembras = $fila2['total'];
    }
    ?>
    <tr>
        <td>♂</td>
        <td>Macho</td>
        <td><?php echo $total_machos; ?></td>
    </tr>
    <tr>
        <td>♀</td>
        <td>Hembra</td>
        <td><?php echo $total_hembras; ?></td>
    </tr>
    <tr>
        <td colspan="2" class="total-general">TOTAL GENERAL</td>
        <td class="total-general"><?php echo $total_machos + $total_hembras; ?></td>
    </tr>
</table>

<a href="read.php">Volver al listado</a>
&nbsp; &nbsp;

<?php $con->close(); ?>
</body>
</html>