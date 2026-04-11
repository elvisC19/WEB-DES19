<?php

$n=$_POST["n"];



?>

<form action="calcular.php" method="post">
<?php

for($i=0;$i<$n;$i++){

echo "<tr>";
echo '<td><input type="number" name ="num"></td>';
echo "</tr>";
    
}

?>
<br><br>

<input type="submit" value="Calcular">

</form>
