<?php 
$numero=$_GET['numero'];
?>
<form action="suma.php" method="get">
<?php
for($i=1;$i<=$numero;$i++){
    ?>
    <input type="text" name="num<?php echo $i; ?>"><br><br>
    <?php

}
?>

<input type="submit" value="calcular">