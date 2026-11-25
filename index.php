<?php 
require_once __DIR__ . "/php/includes/funciones.php";

$comprobar_sesion_tipo = "persona-admin";
require_once __DIR__ . "/php/code/log/comprobar-sesion.php";

$head_titulo_pagina = "Bienvenido";
$head_ruta_base = "";
$head_rutas_de_archivos_css = [];
require __DIR__ . "/php/includes/head.php";

$header_rutas_menu_hamburguesa = [];
$header_mostrar_buscador = false;
$header_mostrar_filtro_materia = false;
$header_mostrar_icono_usuario = false;
require __DIR__ . "/php/includes/header.php";
?>


<?php
require __DIR__ . "/php/includes/pop-up-error.php";

require __DIR__ . "/php/includes/footer.php";
?>