<?php


class Examen{
    private $cadena1;
    private $cadena2;

    function __construct($cadena1,$cadena2){
        $this->cadena1=$cadena1;
        $this->cadena2=$cadena2;
    }

    function cruzar(){
       $posicioni=-1;
         $posicionj=-1;

        for($i=0;$i<strlen($this->cadena1);$i++){
    
    for($j=0;$j<strlen($this->cadena2);$j++){

        if($this->cadena1[$i]==$this->cadena2[$j]){
            $posicioni=$i;
            $posicionj=$j;
            break;
        }
    }
    if($posicioni != -1){
        break;
    }
}
       

    echo "<table border='1' cellspacing='0' cellpadding='5'>";

for ($i = 0; $i < strlen($this->cadena2); $i++) {

    echo "<tr>";

    for ($j = 0; $j < strlen($this->cadena1); $j++) {

        if ($i == $posicionj && $j == $posicioni) {
            echo "<td>" . $this->cadena1[$posicioni] . "</td>";
        }
        elseif ($i == $posicionj) {
            echo "<td>" . $this->cadena1[$j] . "</td>";
        }
        elseif ($j == $posicioni) {
            echo "<td>" . $this->cadena2[$i] . "</td>";
        }
        else {
            echo "<td>&nbsp;</td>";
        }

    }

    echo "</tr>";
}

echo "</table>";

    }

    



}