<?php define("ACCESS",true);

require_once __DIR__ . "/../../php/includes/funciones.php";

$comprobar_sesion_tipo = "guest-persona";
$comprobar_sesion_ruta_base = "../../";
require_once __DIR__ . "/../../php/code/log/comprobar-sesion.php";

$head_titulo_pagina = "Panel Admin";
$head_ruta_base = "../../";
$head_rutas_de_archivos_css = [];
require __DIR__ . "/../../php/includes/head.php";

$header_rutas_menu_hamburguesa = [
    ["nombre" => "Panel", "habilitada" => false,"direccion" => ""],
    ["nombre" => "Perfil", "habilitada" => true, "direccion" => "html/user/perfil.php"],
    ["nombre" => "Materias", "habilitada" => true, "direccion" => "html/admin/crud-materias/ver-materias.php"],
];
$header_mostrar_buscador = false;
$header_mostrar_filtro_materia = false;
$header_mostrar_icono_usuario = true;
require __DIR__ . "/../../php/includes/header.php";
?>


<?php
$pop_up_error_ruta_redirigir_mensaje = "html/admin/panel-admin.php";
require __DIR__ . "/../../php/includes/pop-up-error.php";

$footer_ruta_enlace_cerrar_sesion = "php/code/log/cerrar-sesion.php";
require __DIR__ . "/../../php/includes/footer.php";
?>