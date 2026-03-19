<?php
include "examen.php";

$cadena1=$_GET["cadena1"];
$cadena2=$_GET["cadena2"];

$examen=new Examen($cadena1,$cadena2);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $examen->cruzar();
    ?>

</body>
</html>
