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


      td{
        height: 50px;
        width: 200px;


        
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
    for($j=1;$j<=$nroC;$j++){
        if(($i+$j)%3==0){
            echo"<tr>";
             echo"<td class='rojo'>&nbsp;</td>
             <td class='rojo'>&nbsp;</td>";
                echo"</tr>"; 
        }elseif(($i+$j)%3==1){
            echo"<tr>";
             echo"<td class='amarillo'>&nbsp;</td>";
              
        }else{
             echo"<td class='verde'>&nbsp;</td>"; 
        }
    }
    echo"</tr>";    
}
echo"</table>";
?>







    
</body>
</html>