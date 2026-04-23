<?php
session_start();
include('validar_sesion.php');

$id = $_GET['id'];
include('conexion.php');

$sql = "SELECT id, fotografia, nombre, raza, fecha_nacimiento, peso, sexo, propietario, especie_id
        FROM mascotas WHERE id=$id";
$consulta = mysqli_query($con, $sql);
$mascota = mysqli_fetch_array($consulta);

$sql2 = "SELECT id, nombre FROM especies";
$consulta2 = mysqli_query($con, $sql2);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Mascota</title>
</head>
<body>
<h2>Editar Mascota</h2>
<form action="update.php" method="post" enctype="multipart/form-data">

    <label>Fotografía actual</label><br>
    <?php if ($mascota['fotografia'] != '') { ?>
        <img width="100px" src="images/<?php echo $mascota['fotografia']; ?>"><br>
    <?php } else { ?>
        Sin fotografía<br>
    <?php } ?>
    <input type="file" name="fotografia">
    <br><br>

    <label>Nombre</label>
    <input type="text" name="nombre" value="<?php echo $mascota['nombre']; ?>">
    <br><br>

    <label>Raza</label>
    <input type="text" name="raza" value="<?php echo $mascota['raza']; ?>">
    <br><br>

    <label>Fecha de Nacimiento</label>
    <input type="date" name="fecha_nacimiento" value="<?php echo $mascota['fecha_nacimiento']; ?>">
    <br><br>

    <label>Peso (kg)</label>
    <input type="number" step="0.01" name="peso" value="<?php echo $mascota['peso']; ?>">
    <br><br>

    <label>Sexo</label><br>
    <input type="radio" name="sexo" value="M" <?php echo $mascota['sexo'] == 'M' ? 'checked' : ''; ?>> Macho
    &nbsp;&nbsp;
    <input type="radio" name="sexo" value="H" <?php echo $mascota['sexo'] == 'H' ? 'checked' : ''; ?>> Hembra
    <br><br>

    <label>Propietario</label>
    <input type="text" name="propietario" value="<?php echo $mascota['propietario']; ?>">
    <br><br>

    <label>Especie</label>
    <select name="especie_id">
        <?php while ($especie = mysqli_fetch_array($consulta2)) { ?>
            <option value="<?php echo $especie['id']; ?>"
                <?php echo $especie['id'] == $mascota['especie_id'] ? 'selected' : ''; ?>>
                <?php echo $especie['nombre']; ?>
            </option>
        <?php } ?>
    </select>
    <br><br>

    <input type="hidden" name="id" value="<?php echo $mascota['id']; ?>">
    <input type="hidden" name="fotografia_actual" value="<?php echo $mascota['fotografia']; ?>">
    <input type="submit" value="Actualizar">
</form>

<br>
<a href="read.php">Volver al listado</a>

</body>
</html>