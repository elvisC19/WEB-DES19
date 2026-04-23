<?php
session_start();
include('conexion.php');

$correo = $_POST["correo"];
$password = sha1($_POST["password"]);

$sql = "SELECT correo, nivel FROM usuarios WHERE correo=? AND password=?";
$stmt = $con->prepare($sql);
$stmt->bind_param("ss", $correo, $password);

if ($stmt->execute()) {
    $consulta = $stmt->get_result();
    $usuario = mysqli_fetch_array($consulta);
    if (isset($usuario["correo"])) {
        $_SESSION["correo"] = $usuario["correo"];
        $_SESSION["nivel"] = $usuario["nivel"];
        header("Location:read.php");
    } else {
        session_destroy();
        echo("No está autenticado");
        ?>
        <meta http-equiv="refresh" content="3;url=form-login.html">
        <?php
    }
}
?>