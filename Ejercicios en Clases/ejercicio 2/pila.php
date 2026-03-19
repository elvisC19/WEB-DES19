<?php 

class Pila{
    private $tope;
    private $elementos = [];
    private $max;

    function __construct($max){
        $this->max=$max;
        $this->tope=0;
    }

    function insertar($elemento){
        if($this->tope<$this->max){

        $this->elementos[$this->tope]=$elemento;
        $this->tope++;

        }else{
            echo "Pila llena";
        }
    }

    function eliminar(){
        if($this->tope>0){
            $this->tope--;
            return $this->elementos[$this->tope];
        }else{
            echo "Pila vacia";
        }
    }

    function mostrar(){
        echo "<ul>";
        for($i=$this->tope-1;$i>=0;$i--){
            echo "<li>".$this->elementos[$i]."</li>";
        }
        echo "</ul>";
    }























    





}