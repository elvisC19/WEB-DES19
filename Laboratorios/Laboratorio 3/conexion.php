<?php
$con = new mysqli("localhost", "root", "", "bd_veterinaria26");
if ($con->connect_error) {
    die("error al conectarse: " . $con->connect_error);
}
?>