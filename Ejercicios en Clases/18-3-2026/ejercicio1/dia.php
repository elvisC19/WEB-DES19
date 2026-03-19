
<select name="numero" id="numero">
<?php
$nrodia=$_GET["numero"];

$dias =[1=>"Lunes", 2=>"Martes", 3=>"Miercoles",
 4=>"Jueves", 5=>"Viernes", 6=>"Sabado", 7=>"Domingo"];

foreach($dias as $indice => $dia) {
    $selected = ($indice == $nrodia) ? 'selected' : '';
    ?>
    <option value="<?php echo $indice; ?>" <?php echo $selected; ?>>
        <?php echo $dia; ?>
    </option>
<?php } ?>
</select>



