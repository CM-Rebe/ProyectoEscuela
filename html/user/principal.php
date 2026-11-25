<?php define("ACCESS",true);

require_once __DIR__ . "/php/includes/funciones.php";

$comprobar_sesion_tipo = "guest";
require_once __DIR__ . "/php/code/log/comprobar-sesion.php";

$head_titulo_pagina = "Principal";
$head_ruta_base = "../../";
$head_rutas_de_archivos_css = [];
require __DIR__ . "/php/includes/head.php";

$header_rutas_menu_hamburguesa = [];
$header_mostrar_buscador = true;
$header_mostrar_filtro_materia = true;
$header_mostrar_icono_usuario = true;
require __DIR__ . "/php/includes/header.php";
?>


<?php
$pop_up_error_ruta_redirigir_mensaje = "html/user/principal.php";
require __DIR__ . "/php/includes/pop-up-error.php";

$footer_ruta_enlace_iniciar_sesion = "html/logging/iniciar-sesion.php";
$footer_ruta_enlace_crear_cuenta = "html/logging/crear-cuenta.php";
require __DIR__ . "/php/includes/footer.php";
?>