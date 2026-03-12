<?php
   
    $operacion = $_POST['operacion'];
    $n = (int)$_POST['n'];  
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tabla de <?php echo $operacion; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
        }

        h2 {
            text-align: center;
        }

        
        table {
            border-collapse: collapse;
            margin: 0 auto;
        }

        
        td {
            width: 50px;
            height: 35px;
            text-align: center;
            border: 1px solid orange;
        }

       
        th {
            background-color: #F79646;
            color: white;
            width: 50px;
            height: 35px;
            text-align: center;
            border: 1px solid orange;
        }

       
        .encabezado-fila {
            background-color: #F79646;
            color: black;
            font-weight: bold;
        }
    </style>
</head>
<body>

    
    <h2>Tabla de <?php echo $operacion; ?></h2>

    <table>

        
        <tr>
            <th></th> 
            <?php
                
                for($col = 1; $col <= $n; $col++){
                    echo "<th>$col</th>";
                }
            ?>
        </tr>

        <?php
            
            for($fila = 1; $fila <= $n; $fila++){
                echo "<tr>";

                
                echo "<td class='encabezado-fila'><b>$fila</b></td>";

                for($col = 1; $col <= $n; $col++){

                    
                    if($operacion == "Suma"){
                        $resultado = $fila + $col;

                    }else if($operacion == "Resta"){
                        $resultado = $fila - $col;

                    }else if($operacion == "Multiplicacion"){
                        $resultado = $fila * $col;

                    }else if($operacion == "Division"){
                        
                    
                        $resultado = round($fila / $col, 2); 
                    }

                    echo "<td>$resultado</td>";
                }

                echo "</tr>";
            }
        ?>

    </table>

</body>
</html>