<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        table, td{
            border: 1px solid black;
        }


    </style>
    
    <?php
        $filas=3;
        $columnas=4;

        echo "<table>";

        for($i=0; $i<=$filas; $i++){
            echo "<tr>";
            for($j=0; $j<=$columnas; $j++){
                echo "<td> &nbsp; </td>";
            }
            echo "</tr>";

            
        }
    ?>

</body>
</html>