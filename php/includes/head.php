<?php require_once __DIR__ . "/funciones.php"; access();

/** @var string $head_titulo_pagina The title of the page*/
$head_titulo_pagina = $head_titulo_pagina ?? "";

/** @var string $head_ruta_base The base of which archives routes call*/
$head_ruta_base = $head_ruta_base ?? "";

/** @var array $head_rutas_de_archivos_css The routes of css archives that aren't mentioned*/
$head_rutas_de_archivos_css = $head_rutas_de_archivos_css ?? [];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($head_titulo_pagina) ?> | Apuntes Técnicos</title>

    <?php if (!empty($head_ruta_base)) { echo '<base href="'.e($head_ruta_base).'">'; } ?>

    <link rel="shortcut icon" href="assets/static/img/Logo AT.png" type="image/x-icon">

    <link rel="stylesheet" href="assets/css/global/paleta-colores.css">
    <link rel="stylesheet" href="assets/css/global/selector-universal.css">
    <link rel="stylesheet" href="assets/css/global/contenedores.css">

    <?php foreach ($head_rutas_de_archivos_css as $rutas) {
        echo '<link rel="stylesheet" href="'.e($rutas).'">';
    } ?>
</head>
<body>