<?php

include "conexion.php";

$id = intval($_GET['id']); 

$sql = "SELECT recetas.id, fotografia, titulo, preparacion,
               tiporeceta.tiporeceta AS tipo
        FROM recetas
        LEFT JOIN tiporeceta ON recetas.idtiporeceta = tiporeceta.id
        WHERE recetas.id = $id
        LIMIT 1";

$consulta = mysqli_query($con, $sql);
$receta   = mysqli_fetch_array($consulta);


$lista = array(
    'Harina', 'Azucar', 'Sal', 'Aceite', 'Leche',
    'Huevos', 'Mantequilla', 'Pimienta', 'Ajo', 'Cebolla',
    'Tomate', 'Pimiento', 'Comino', 'Oregano', 'Limon'
);

srand($id * 3);
$ingredientes = array();
$usados       = array();

while (count($ingredientes) < 5) {
    $i = rand(0, count($lista) - 1);
    if (!in_array($i, $usados)) {
        $usados[]       = $i;
        $ingredientes[] = $lista[$i];
    }
}

$con->close();
?>

<img
    src="images/<?php echo $receta['fotografia']; ?>"
    width="300"
    height="300"
    style="object-fit:cover; display:block; margin:0 auto 10px auto;"
>

<h3 style="text-align:center; color:#2c6fad;">
    <?php echo $receta['titulo']; ?>
</h3>


<p style="text-align:center; color:#888; margin-bottom:8px;">
    Tipo: <strong><?php echo $receta['tipo']; ?></strong>
</p>


<p style="margin-bottom:10px;">
    <strong>Preparacion:</strong><br>
    <?php echo nl2br($receta['preparacion']); ?>
</p>


<strong>Ingredientes:</strong>
<ul>
    <?php foreach ($ingredientes as $ing) { ?>
        <li><?php echo $ing; ?></li>
    <?php } ?>
</ul>


<button onclick="cerrarModal()"style="background:#c0392b; color:white; border:none;padding:8px 16px;  border-radius:4px;display:block; margin:10px auto 0 auto;">
    Cerrar Modal
</button>