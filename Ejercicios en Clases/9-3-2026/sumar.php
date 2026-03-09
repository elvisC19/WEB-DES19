

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<style>

    body{
        background-color: white;
    }

    .cuadrado{
        margin:120px auto;
        width: 200px;
        padding: 20px;

        justify-content: center;

        border:1px solid black;
        background-color: lightblue;
    }



</style>
    


<div class = "cuadrado">

<?php

include'operaciones.php';


$num1 = $_GET['num1'];
$num2 = $_GET['num2'];


$suma = sumar($num1, $num2);



echo "La suma es:".$suma;

?>

</div>



</body>
</html>