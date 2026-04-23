<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Mascota</title>
</head>
<body>

<?php
session_start();
include('validar_sesion.php');
include('conexion.php');
$sql = "SELECT id, nombre FROM especies";
$consulta = mysqli_query($con, $sql);
?>

<h2>Registrar Nueva Mascota</h2>

<form action="create.php" method="post" enctype="multipart/form-data">

    <label for="fotografia">Fotografía</label>
    <input type="file" name="fotografia">
    <br><br>

    <label for="nombre">Nombre</label>
    <input type="text" name="nombre">
    <br><br>

    <label for="raza">Raza</label>
    <input type="text" name="raza">
    <br><br>

    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
    <input type="date" name="fecha_nacimiento">
    <br><br>

    <label for="peso">Peso (kg)</label>
    <input type="number" step="0.01" name="peso">
    <br><br>

    <label>Sexo</label><br>
    <input type="radio" name="sexo" value="M" required> Macho
    &nbsp;&nbsp;
    <input type="radio" name="sexo" value="H"> Hembra
    <br><br>

    <label for="propietario">Propietario</label>
    <input type="text" name="propietario">
    <br><br>

    <label for="especie_id">Especie</label>
    <select name="especie_id">
        <?php while ($especie = mysqli_fetch_array($consulta)) { ?>
            <option value="<?php echo $especie['id']; ?>"><?php echo $especie['nombre']; ?></option>
        <?php } ?>
    </select>
    <br><br>

    <input type="submit" value="Registrar">
</form>

<br>
<a href="read.php">Volver al listado</a>

</body>
</html>