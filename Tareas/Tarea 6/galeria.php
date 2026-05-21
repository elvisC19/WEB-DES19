<?php


include "conexion.php";


$sql = "SELECT recetas.id, fotografia, titulo, tiporeceta.tiporeceta AS tipo
        FROM recetas
        LEFT JOIN tiporeceta ON recetas.idtiporeceta = tiporeceta.id";

$consulta = mysqli_query($con, $sql);
?>

<h3>Galeria de Recetas</h3>


<div style="display:grid; grid-template-columns:repeat(3,1fr); gap:10px;">

<?php while ($receta = mysqli_fetch_array($consulta)) { ?>

    <div style="text-align:center;">

       
        <img
            src="images/<?php echo $receta['fotografia']; ?>"
            alt="<?php echo $receta['titulo']; ?>"
            width="80"
            height="80"
            style="object-fit:cover; cursor:pointer; border:2px solid #ccc;"
            onclick="abrirModal(<?php echo $receta['id']; ?>)"
        >
        <p style="font-size:11px;"><?php echo $receta['titulo']; ?></p>

    </div>

<?php } ?>

</div>

<?php $con->close(); ?>