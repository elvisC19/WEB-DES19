<?php
include('conexion.php')

$correo = $_POST['correo'];
$password = sha1($_POST['password']);
$sql = "select correo  , nivel from usuarios where correo= ? and password = ?";
$stmt = $con-> prepare($sql);
$stmt -> bind_param("ss",$correo,$password);

if($stmt -> execute()) {
        $consulta= $stmt -> get_result();
        $usuario = mysqli_fetch_array($consulta);
        if(isset($usuario["correo"])){
            echo("usuario autenticado");
        }else{
            echo("usuario no autenticado");
        }

    }

?>




