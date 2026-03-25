<?php
require "proceNombres.php";
require "tablaCalifi.php";
require "BuscarPalabr.php";

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte Académico</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
 
        h1 { text-align: center; }
 
        .seccion {
            margin-bottom: 30px;
        }
 
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 10px;
        }
 
        th, td {
            border: 1px solid black;
            padding: 6px;
            text-align: center;
        }
 
        th { background-color: lightgray; }
 
        .mejor { background-color: lightgreen; }
        .peor  { background-color: lightcoral; }
 
        .aprobado { color: green; }
        .reprobado { color: red; }
 
        mark { background-color: yellow; }
 
        textarea, input[type="text"] {
            width: 100%;
        }
 
        .texto-resultado {
            border: 1px solid black;
            padding: 8px;
            margin-top: 8px;
            white-space: pre-wrap;
        }
    </style>
</head>
<body>
 
<h1>Reporte Académico</h1>
 

<div class="seccion">
    <h2>Parte A – Procesador de Nombres</h2>
 
    <form method="POST">
        <label for="nombres">Ingresa varios nombres separados por comas:</label><br><br>
        <textarea name="nombres" id="nombres" rows="3"
            placeholder="Ej: ana garcía, LUIS pérez, maría LÓPEZ"><?php
            echo isset($_POST["nombres"]) ? $_POST["nombres"] : "";
        ?></textarea>
        <br>
        <button type="submit">Procesar Nombres</button>
    </form>
 
    <?php if ($totalNombres > 0): ?>
        <br>
        <p><strong>Nombres procesados (<?php echo $totalNombres; ?> en total):</strong></p>
        <ol>
            <?php foreach ($nombres as $nombre): ?>
                <li><?php echo $nombre; ?></li>
            <?php endforeach; ?>
        </ol>
    <?php endif; ?>
</div>
 

<div class="seccion">
    <h2>Parte B – Tabla de Calificaciones</h2>
 
    <table>
        <tr>
            <th>Estudiante</th>
            <th>Nota 1</th>
            <th>Nota 2</th>
            <th>Nota 3</th>
            <th>Nota 4</th>
            <th>Promedio</th>
            <th>Estado</th>
        </tr>
 
        <?php foreach ($estudiantes as $nombre => $calificaciones): ?>
            <?php
            $promedio = $promedios[$nombre];
 
            
            if ($nombre == $mejorNombre) {
                $clase = "mejor";
            } elseif ($nombre == $peorNombre) {
                $clase = "peor";
            } else {
                $clase = "";
            }
 
         
            if ($promedio >= 6) {
                $estado = "<span class='aprobado'>Aprobado</span>";
            } else {
                $estado = "<span class='reprobado'>Reprobado</span>";
            }
            ?>
            <tr class="<?php echo $clase; ?>">
                <td><?php echo $nombre; ?></td>
                <?php foreach ($calificaciones as $nota): ?>
                    <td><?php echo $nota; ?></td>
                <?php endforeach; ?>
                <td><?php echo $promedio; ?></td>
                <td><?php echo $estado; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
 
    <p><small>Verde = mejor promedio &nbsp;|&nbsp; Rojo = peor promedio</small></p>
</div>
 

<div class="seccion">
    <h2>Parte C – Buscador de Palabras</h2>
 
    <form method="POST">
        <label for="texto">Texto donde buscar:</label><br><br>
        <textarea name="texto" id="texto" rows="5"
            placeholder="Escribe o pega aquí un texto largo..."><?php
            echo isset($_POST["texto"]) ? $_POST["texto"] : "";
        ?></textarea>
        <br><br>
        <label for="palabra">Palabra clave a buscar:</label><br><br>
        <input type="text" name="palabra" id="palabra"
            placeholder="Ej: php"
            value="<?php echo isset($_POST["palabra"]) ? $_POST["palabra"] : ""; ?>">
        <br>
        <button type="submit">Buscar</button>
    </form>
 
    <?php if ($textoResaltado != ""): ?>
        <br>
        <p>Resultado (palabra "<strong><?php echo $palabraClave; ?></strong>" resaltada):</p>
        <div class="texto-resultado"><?php echo $textoResaltado; ?></div>
        <p><strong>Total de coincidencias encontradas: <?php echo $totalCoincidencias; ?></strong></p>
    <?php elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["palabra"]) && strlen($_POST["palabra"]) == 0): ?>
        <p style="color: red;">Por favor ingresa una palabra clave.</p>
    <?php endif; ?>
</div>
 
</body>
</html>