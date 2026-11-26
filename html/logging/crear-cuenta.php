<?php define("ACCESS",true);

require_once __DIR__ . "/../../php/includes/funciones.php";

$comprobar_sesion_tipo = "persona-admin";
require_once __DIR__ . "/../../php/code/log/comprobar-sesion.php";

$head_titulo_pagina = "Crear Cuenta";
$head_ruta_base = "../../";
$head_rutas_de_archivos_css = [];
require __DIR__ . "/../../php/includes/head.php";

$header_rutas_menu_hamburguesa = [
    ["nombre" => "Inicio", "habilitada" => true, "direccion" => "index.php"],
    ["nombre" => "Crear Cuenta", "habilitada" => false, "direccion" => ""],
    ["nombre" => "Inicia Sesión", "habilitada" => true, "direccion" => "html/logging/iniciar-sesion.php"],
];
$header_mostrar_buscador = false;
$header_mostrar_filtro_materia = false;
$header_mostrar_icono_usuario = false;
require __DIR__ . "/../../php/includes/header.php";
?>

<?php
$pop_up_error_ruta_redirigir_mensaje = "html/logging/crear-cuenta.php";
require __DIR__ . "/../../php/includes/pop-up-error.php";

$footer_ruta_enlace_iniciar_sesion = "html/logging/iniciar-sesion.php";
$footer_ruta_enlace_crear_cuenta = "";
$footer_ruta_enlace_cerrar_sesion = "";
require __DIR__ . "/../../php/includes/footer.php";
?>