<?php
if (!isset($_SESSION["correo"])) {
    header("Location: form-login.html");
    exit();
}
?>