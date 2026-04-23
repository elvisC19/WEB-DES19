<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clínica Veterinaria - Mascotas</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid black; padding: 6px 10px; }
        th { background-color: #1a6bb5; color: white; }
        tr.par   { background-color: #d9d9d9; }
        tr.impar { background-color: #ffffff; }
        th a { color: white; text-decoration: none; }
    </style>
</head>
<body>

<?php
session_start();
include('validar_sesion.php');
include('conexion.php');

$orden = "m.id";
if (isset($_GET['orden'])) {
    $orden = $_GET['orden'];
}

$buscar = "";
$buscar_valor = "";
if (isset($_GET['buscar']) && $_GET['buscar'] != "") {
    $buscar_valor = $_GET['buscar'];
    $buscar = "WHERE m.nombre LIKE '%" . $buscar_valor . "%'";
}

$sql = "SELECT m.id, m.fotografia, m.nombre, m.raza, m.fecha_nacimiento, m.peso, m.sexo,
        m.propietario, e.nombre AS especie
        FROM mascotas m
        LEFT JOIN especies e ON m.especie_id = e.id
        $buscar
        ORDER BY " . $orden;

$consulta = mysqli_query($con, $sql);
?>

<h2>Clínica Veterinaria - Listado de Mascotas</h2>

<form action="read.php" method="get">
    <label for="buscar">Buscar por nombre:</label>
    <input type="text" name="buscar" value="<?php echo $buscar_valor; ?>">
    <input type="submit" value="Buscar">
</form>

<br>

<table>
    <tr>
        <th>Nro</th>
        <th>Fotografía</th>
        <th><a href="read.php?orden=m.nombre&buscar=<?php echo $buscar_valor; ?>">Nombre</a></th>
        <th><a href="read.php?orden=m.raza&buscar=<?php echo $buscar_valor; ?>">Raza</a></th>
        <th><a href="read.php?orden=m.fecha_nacimiento&buscar=<?php echo $buscar_valor; ?>">Fecha Nacimiento</a></th>
        <th><a href="read.php?orden=m.peso&buscar=<?php echo $buscar_valor; ?>">Peso</a></th>
        <th><a href="read.php?orden=m.sexo&buscar=<?php echo $buscar_valor; ?>">Sexo</a></th>
        <th><a href="read.php?orden=m.propietario&buscar=<?php echo $buscar_valor; ?>">Propietario</a></th>
        <th><a href="read.php?orden=e.nombre&buscar=<?php echo $buscar_valor; ?>">Especie</a></th>
        <th>Operaciones</th>
    </tr>

<?php
$nro = 1;
while ($mascota = mysqli_fetch_array($consulta)) {
    $clase = ($nro % 2 == 0) ? "par" : "impar";
    ?>
    <tr class="<?php echo $clase; ?>">
        <td><?php echo $nro; ?></td>
        <td>
            <?php if ($mascota['fotografia'] != '') { ?>
                <img width="80px" src="images/<?php echo $mascota['fotografia']; ?>">
            <?php } else { ?>
                Sin foto
            <?php } ?>
        </td>
        <td><?php echo $mascota['nombre']; ?></td>
        <td><?php echo $mascota['raza']; ?></td>
        <td><?php echo $mascota['fecha_nacimiento']; ?></td>
        <td><?php echo $mascota['peso']; ?> kg</td>
        <td><?php echo $mascota['sexo'] == 'M' ? 'Macho' : 'Hembra'; ?></td>
        <td><?php echo $mascota['propietario']; ?></td>
        <td><?php echo $mascota['especie']; ?></td>
        <td>
            <a href="form-editar.php?id=<?php echo $mascota['id']; ?>">Editar</a>
            |
            <a href="delete.php?id=<?php echo $mascota['id']; ?>">Eliminar</a>
        </td>
    </tr>
<?php
    $nro++;
}
$con->close();
?>
</table>

<br>
<a href="form-insertar.php">Registrar nueva mascota</a>
&nbsp;&nbsp;
<a href="reporte-especies.php">Ver Reporte por Especie</a>


</body>
</html>