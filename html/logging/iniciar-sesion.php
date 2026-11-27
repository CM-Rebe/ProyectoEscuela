<?php define("ACCESS",true);

require_once __DIR__ . "/../../php/includes/funciones.php";

$comprobar_sesion_tipo = "persona-admin";
require_once __DIR__ . "/../../php/code/log/comprobar-sesion.php";

$head_titulo_pagina = "Iniciar Sesión";
$head_ruta_base = "../../";
$head_rutas_de_archivos_css = [];
require __DIR__ . "/../../php/includes/head.php";

$header_rutas_menu_hamburguesa = [
    ["nombre" => "Inicio", "habilitada" => true, "direccion" => "index.php"],
    ["nombre" => "Iniciar Sesión", "habilitada" => false, "direccion" => ""],
    ["nombre" => "Crea una Cuenta", "habilitada" => true, "direccion" => "html/logging/crear-cuenta.php"],
];
$header_mostrar_buscador = false;
$header_mostrar_filtro_materia = false;
$header_mostrar_icono_usuario = false;
require __DIR__ . "/../../php/includes/header.php";
?>

<?php 
$form_ruta_accion = "php/code/log/iniciar-sesion.php";
$form_titulo = "Iniciar Sesión";
$form_datos = [
    [
        "label" => ["name" => "Nombre","for" => "nombre"],
        "campo" => [
            "campo_tipo" => "input",
            "id" => "nombre",
            "name" => "nombre",
            "type" => "text",
            "placeholder" => "Ingrese el nombre",
            "required" => "required",
            "autocomplete" => "name",
            "minlenght" => 4,
            "maxlenght" => 50,
        ],
    ],
    [
        "label" => ["name" => "Apellido","for" => "apellido"],
        "campo" => [
            "campo_tipo" => "input",
            "id" => "apellido",
            "name" => "apellido",
            "type" => "text",
            "placeholder" => "Ingrese su apellido",
            "required" => "required",
            "autocomplete" => "additional-name",
            "minlenght" => 4,
            "maxlenght" => 50,
        ],
    ],
    [
        "label" => ["name" => "Curso", "for" => "curso"],
        "campo" => [
            "campo_tipo" => "input",
            "id" => "curso",
            "name" => "curso",
            "type" => "text",
            "placeholder" => "Ingrese su curso",
            "required" => "required",
            "autocomplete" => "off",
            "minlenght" => 4,
            "maxlenght" => 10,
        ],
    ],
    [
        "label" => ["name" => "Email", "for" => "email"],
        "campo" => [
            "campo_tipo" => "input",
            "id" => "email",
            "name" => "email",
            "type" => "email",
            "placeholder" => "Ingrese su email",
            "required" => "required",
            "autocomplete" => "email",
            "minlenght" => 4,
            "maxlenght" => 50,
        ],
    ],
    [
        "label" => ["name" => "Contraseña", "for" => "clave"],
        "campo" => [
            "campo_tipo" => "input",
            "id" => "clave",
            "name" => "clave",
            "type" => "password",
            "placeholder" => "Ingrese su contraseña",
            "required" => "required",
            "autocomplete" => "new-password",
            "minlenght" => 4,
            "maxlenght" => 50,
        ],
    ],
];
$form_nombre_boton_submit = "Iniciar Sesión";
$form_boton_volver = ["nombre" => "Volver", "ruta" => "index.php",];
require_once __DIR__ . "/../../php/includes/formulario.php";

?>

<?php
$pop_up_error_ruta_redirigir_mensaje = "html/logging/iniciar-sesion.php";
require __DIR__ . "/../../php/includes/pop-up-error.php";

$footer_ruta_enlace_iniciar_sesion = "";
$footer_ruta_enlace_crear_cuenta = "html/logging/crear-cuenta.php";
$footer_ruta_enlace_cerrar_sesion = "";
require __DIR__ . "/../../php/includes/footer.php";
?>