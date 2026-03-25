<?php

$metodo = $_SERVER["REQUEST_METHOD"];


if ($metodo == "POST") {
    $datos = $_POST;
} else {
    $datos = $_GET;
}



$nombre      = htmlspecialchars(trim($datos["nombre"]      ?? ""));
$email       = htmlspecialchars(trim($datos["email"]       ?? ""));
$carrera     = htmlspecialchars(trim($datos["carrera"]     ?? ""));
$semestre    = htmlspecialchars(trim($datos["semestre"]    ?? ""));
$turno       = htmlspecialchars(trim($datos["turno"]       ?? ""));
$comentarios = htmlspecialchars(trim($datos["comentarios"] ?? ""));


$materias = [];
if (isset($datos["materia"]) && is_array($datos["materia"])) {
    foreach ($datos["materia"] as $m) {
        $materias[] = htmlspecialchars($m);
    }
}


$errores = [];


if ($nombre == "") {
    $errores[] = "El nombre completo es obligatorio.";
}


if ($semestre == "") {
    $errores[] = "El semestre es obligatorio.";
} elseif ($semestre < 1 || $semestre > 10) {
    $errores[] = "El semestre debe ser un valor entre 1 y 10.";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado del Registro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #222;
        }

        .caja {
            background-color: white;
            border: 1px solid #ccc;
            padding: 20px;
            max-width: 600px;
            margin: 20px auto;
        }

        
        .metodo {
            text-align: center;
            font-size: 16px;
            margin-bottom: 15px;
        }

        .badge-post {
            background-color: #2a7ae2;
            color: white;
            padding: 4px 12px;
            font-weight: bold;
        }

        .badge-get {
            background-color: #e67e22;
            color: white;
            padding: 4px 12px;
            font-weight: bold;
        }

       
        .errores {
            background-color: #fdecea;
            border: 1px solid #e74c3c;
            padding: 12px 16px;
            margin-bottom: 15px;
        }

        .errores p {
            margin: 0 0 5px 0;
            font-weight: bold;
            color: #c0392b;
        }

        .errores ul {
            margin: 5px 0 0 0;
            padding-left: 20px;
            color: #c0392b;
        }

        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th {
            background-color: #444;
            color: white;
            padding: 8px 12px;
            text-align: left;
            width: 35%;
        }

        td {
            border: 1px solid #ccc;
            padding: 8px 12px;
            background-color: #fafafa;
        }

        tr:nth-child(even) td {
            background-color: #f0f0f0;
        }

       
        .volver {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #444;
        }
    </style>
</head>
<body>

<h1>Resultado del Registro</h1>

<div class="caja">

    
    <p class="metodo">
        Método utilizado:
        <?php if ($metodo == "POST"): ?>
            <span class="badge-post">POST</span>
        <?php else: ?>
            <span class="badge-get">GET</span>
        <?php endif; ?>
    </p>

    
    <?php if (count($errores) > 0): ?>
        <div class="errores">
            <p>Se encontraron los siguientes errores:</p>
            <ul>
                <?php foreach ($errores as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    
    <?php if (count($errores) == 0): ?>
        <table>
            <tr>
                <th>Campo</th>
                <th>Valor recibido</th>
            </tr>
            <tr>
                <td><strong>Nombre</strong></td>
                <td><?php echo $nombre; ?></td>
            </tr>
            <tr>
                <td><strong>Correo</strong></td>
                <td><?php echo $email; ?></td>
            </tr>
            <tr>
                <td><strong>Carrera</strong></td>
                <td><?php echo $carrera; ?></td>
            </tr>
            <tr>
                <td><strong>Semestre</strong></td>
                <td><?php echo $semestre; ?></td>
            </tr>
            <tr>
                <td><strong>Turno</strong></td>
                <td><?php echo $turno != "" ? $turno : "No seleccionado"; ?></td>
            </tr>
            <tr>
                <td><strong>Materias</strong></td>
                <td>
                    <?php if (count($materias) > 0): ?>
                        <ul style="margin:0; padding-left:16px;">
                            <?php foreach ($materias as $m): ?>
                                <li><?php echo $m; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        Ninguna seleccionada
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td><strong>Comentarios</strong></td>
                <td><?php echo $comentarios != "" ? $comentarios : "Sin comentarios"; ?></td>
            </tr>
        </table>
    <?php endif; ?>

    <a class="volver" href="registro.html">&larr; Volver al formulario</a>

</div>

</body>
</html>