<?php 
$con=new mysqli("localhost","root","","bd_agenta26");

if ($con->connect_error)
    {
      die("error  alc conectarse".$con->connect_error);
    }
?>

