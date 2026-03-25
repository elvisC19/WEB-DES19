<?php
$a=$_GET["a"];
$b=$_GET["b"];


session_start();



?>


<Ul>
    <li><a href= "resultado.php?a=<?php echo $a ?>&b=<?php echo $b ?>&operacion=sumar">Sumar</a></li>
    <li><a href= "resultado.php?a=<?php echo $a ?>&b=<?php echo $b ?>&operacion=restar">Restar</a></li>
    <li><a href= "resultado.php?a=<?php echo $a ?>&b=<?php echo $b ?>&operacion=multiplicar">Multiplicar</a></li>
</Ul>
  