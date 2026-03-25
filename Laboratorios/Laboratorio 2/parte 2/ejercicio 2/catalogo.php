<?php

$productos = [
    [
        "nombre"          => "Laptop Dell",
        "categoria"       => "Computadoras",
        "precio"          => 9700,
        "disponible"      => true,
        "caracteristicas" => ["8GB RAM", "512GB SSD", "Intel i5"]
    ],
    [
        "nombre"          => "Mouse",
        "categoria"       => "Accesorios",
        "precio"          => 230,
        "disponible"      => true,
        "caracteristicas" => ["Inalámbrico", "Ergonómico", "USB"]
    ],
    [
        "nombre"          => "Teclado",
        "categoria"       => "Accesorios",
        "precio"          => 270,
        "disponible"      => false,
        "caracteristicas" => ["RGB", "Switch Blue", "USB"]
    ],
    [
        "nombre"          => "Monitor Samsung",
        "categoria"       => "Pantallas",
        "precio"          => 1400,
        "disponible"      => true,
        "caracteristicas" => ["24 pulgadas", "Full HD", "HDMI"]
    ],
    [
        "nombre"          => "Tablet",
        "categoria"       => "Computadoras",
        "precio"          => 2500,
        "disponible"      => false,
        "caracteristicas" => ["Android", "64GB", "WiFi"]
    ]
];


usort($productos, function($a, $b) {
    if ($a["precio"] == $b["precio"]) {
        return 0;
    }
    if ($a["precio"] < $b["precio"]) {
        return -1;
    }
    return 1;
});

$totalInventario = 0;
$disponibles     = 0;
$agotados        = 0;

$categoriaFiltro = "Accesorios";

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Catálogo de Productos</title>
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
            margin-bottom: 30px;
        }

        h2 {
            color: #222;
            border-left: 4px solid #555;
            padding-left: 10px;
            margin-top: 40px;
        }

     
        .contenedor-tarjetas {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        
        .tarjeta {
            background-color: white;
            border: 1px solid #ccc;
            padding: 15px;
            width: 220px;
        }

        .tarjeta h3 {
            margin: 0 0 10px 0;
            font-size: 16px;
            color: #222;
        }

        .tarjeta p {
            margin: 5px 0;
            font-size: 14px;
            color: #444;
        }

        .tarjeta ul {
            margin: 8px 0 0 0;
            padding-left: 18px;
            font-size: 13px;
            color: #555;
        }

     
        .precio {
            font-size: 16px;
            font-weight: bold;
            color: #222;
        }

        
        .disponible {
            color: white;
            background-color: green;
            padding: 2px 8px;
            font-size: 12px;
        }

        .agotado {
            color: white;
            background-color: red;
            padding: 2px 8px;
            font-size: 12px;
        }

        
        .resumen {
            background-color: white;
            border: 1px solid #ccc;
            padding: 15px;
            margin-top: 20px;
            max-width: 300px;
        }

        .resumen p {
            margin: 6px 0;
            font-size: 14px;
        }

       
        .filtro {
            margin-top: 30px;
        }

        .filtro-item {
            background-color: white;
            border: 1px solid #ccc;
            padding: 8px 12px;
            margin: 6px 0;
            max-width: 350px;
            font-size: 14px;
        }
    </style>
</head>
<body>

<h1>Catálogo de Productos</h1>

<h2>Todos los productos</h2>

<div class="contenedor-tarjetas">

<?php foreach ($productos as $p): ?>

    <?php
  
    $totalInventario += $p["precio"];

    
    if ($p["disponible"]) {
        $disponibles++;
        $claseEstado = "disponible";
        $textoEstado = "Disponible";
    } else {
        $agotados++;
        $claseEstado = "agotado";
        $textoEstado = "Agotado";
    }
    ?>

    <div class="tarjeta">
        <h3><?php echo $p["nombre"]; ?></h3>
        <p>Categoría: <?php echo $p["categoria"]; ?></p>
        <p class="precio">Bs <?php echo number_format($p["precio"], 2); ?></p>
        <p><span class="<?php echo $claseEstado; ?>"><?php echo $textoEstado; ?></span></p>
        <ul>
            <?php foreach ($p["caracteristicas"] as $c): ?>
                <li><?php echo $c; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

<?php endforeach; ?>

</div>



<h2>Resumen del inventario</h2>
<div class="resumen">
    <p><strong>Total inventario:</strong> Bs <?php echo number_format($totalInventario, 2); ?></p>
    <p><strong>Disponibles:</strong> <?php echo $disponibles; ?></p>
    <p><strong>Agotados:</strong> <?php echo $agotados; ?></p>
</div>



<div class="filtro">
    <h2>Categoría: <?php echo $categoriaFiltro; ?></h2>

    <?php foreach ($productos as $p): ?>
        <?php if ($p["categoria"] == $categoriaFiltro): ?>
            <div class="filtro-item">
                <strong><?php echo $p["nombre"]; ?></strong> — Bs <?php echo number_format($p["precio"], 2); ?>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>

</body>
</html>