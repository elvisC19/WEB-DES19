<?php

$nroF=$_GET["numeroF"];
$nroC=$_GET["numeroC"];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>

        table{
            border-collapse: collapse;
            
        }


      td{
        height: 50px;
        width: 200px;
        border: 1px solid black;
      }

    

        .rojo{

        background-color:red;
        }

        .amarillo{
            background-color:yellow;
        }

        .verde{
            background-color:green;
        }





    </style>
</head>
<body>

<?php
echo"<table>";
for($i=1;$i<=$nroF;$i++){
 echo"<tr>"; 
    if($i % 3 == 1){
        $color="rojo";
    }elseif($i % 3 == 2){
        $color="amarillo";
    }else{
        $color="verde";
    }
    
    for($j=1;$j<=$nroC;$j++){
        echo"<td class='$color'></td>";
    }
    echo"</tr>";
}
echo"</table>";
?> 







    
</body>
</html>