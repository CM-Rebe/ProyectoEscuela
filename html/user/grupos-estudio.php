<?php define("ACCESS",true);

require_once __DIR__ . "/../../php/includes/funciones.php";

$comprobar_sesion_tipo = "guest";
require_once __DIR__ . "/../../php/code/log/comprobar-sesion.php";

$head_titulo_pagina = "Grupos De Estudio";
$head_ruta_base = "../../";
$head_rutas_de_archivos_css = [];
require __DIR__ . "/../../php/includes/head.php";

$header_rutas_menu_hamburguesa = [
    ["nombre" => "Inicio", "habilitada" => true,"direccion" => "html/user/principal.php"],
    ["nombre" => "Perfil", "habilitada" => true, "direccion" => "html/user/perfil.php"],
    ["nombre" => "Apuntes", "habilitada" => true, "direccion" => "html/user/apuntes.php"],
    ["nombre" => "Grupos Estudio", "habilitada" => false, "direccion" => ""],
    ["nombre" => "Ranking", "habilitada" => true, "direccion" => "html/user/ranking.php"],
    ["nombre" => "Mis apuntes", "habilitada" => true, "direccion" => "html/user/crud-apuntes/ver-mis-apuntes.php"],
    ["nombre" => "Mis grupos de estudio", "habilitada" => true, "direccion" =>"html/user/crud-grupos-estudio/ver-mis-grupos-estudio.php"],
];
$header_mostrar_buscador = true;
$header_mostrar_filtro_materia = true;
$header_mostrar_icono_usuario = true;
require __DIR__ . "/../../php/includes/header.php";
?>



<?php
$pop_up_error_ruta_redirigir_mensaje = "html/user/grupos-estudio.php";
require __DIR__ . "/../../php/includes/pop-up-error.php";

$footer_ruta_enlace_iniciar_sesion = "";
$footer_ruta_enlace_crear_cuenta = "";
$footer_ruta_enlace_cerrar_sesion = "html/logging/cerrar-sesion.php";
require __DIR__ . "/../../php/includes/footer.php";
?>