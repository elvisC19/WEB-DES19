<?php 
class alumno{
     private $cu;
    private $nombre;
    private $apellidos;
    private $materias = [];


    function__construct($cu,$nombre,$apellidos,$materias)
    {
        $this->cu=$cu;
        $this->nombre=$nombre;
        $this->apellidos=$apellidos;
        $this->materias=$materias;

    }

    function mostrar{
        echo"<div style="display: flex;flex-direction: :column;"></div>";
        echo"<ul>";
        echo "<li> Cu: $this->cu <br>";
      echo "<li> Nombres: $this->nombre <br>";
      echo "<li> Apellidos: $this->apellidos <br>";

      foreach($this->materias as $materia){
        echo $materia "<br>";
      }



    }
}