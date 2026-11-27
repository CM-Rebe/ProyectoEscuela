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
$form_ruta_accion = "php/code/log/crear-cuenta.php";
$form_titulo = "Crear cuenta";
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
$form_nombre_boton_submit = "Crear Cuenta";
$form_boton_volver = ["nombre" => "Volver", "ruta" => "index.php",];
require_once __DIR__ . "/../../php/includes/formulario.php";

?>

<?php
$pop_up_error_ruta_redirigir_mensaje = "html/logging/crear-cuenta.php";
require __DIR__ . "/../../php/includes/pop-up-error.php";

$footer_ruta_enlace_iniciar_sesion = "html/logging/iniciar-sesion.php";
$footer_ruta_enlace_crear_cuenta = "";
$footer_ruta_enlace_cerrar_sesion = "";
require __DIR__ . "/../../php/includes/footer.php";
?>