<?php define("ACCESS",true);

require_once __DIR__ . "/../../../php/includes/funciones.php";

$comprobar_sesion_tipo = "guest-persona";
$comprobar_sesion_ruta_base = "../../../";
require_once __DIR__ . "/../../../php/code/log/comprobar-sesion.php";

$head_titulo_pagina = "Crear Materia";
$head_ruta_base = "../../../";
$head_rutas_de_archivos_css = [];
require __DIR__ . "/../../../php/includes/head.php";

$header_rutas_menu_hamburguesa = [
    ["nombre" => "Panel", "habilitada" => true,"direccion" => "html/admin/panel-admin.php"],
    ["nombre" => "Perfil", "habilitada" => true, "direccion" => "html/user/perfil.php"],
    ["nombre" => "Materias", "habilitada" => true, "direccion" => "html/admin/crud-materias/ver-materias.php"],
    ["nombre" => "Crear Materia", "habilitada" => false, "direccion" => "html/admin/crud-materias/crear-materias.php"],
    ["nombre" => "Editar Materia", "habilitada" => true, "direccion" => "html/admin/crud-materias/editar-materias.php"],
    ["nombre" => "Eliminar Materia", "habilitada" => true, "direccion" => "html/admin/crud-materias/eliminar-materias.php"],
];
$header_mostrar_buscador = false;
$header_mostrar_filtro_materia = false;
$header_mostrar_icono_usuario = true;
require __DIR__ . "/../../../php/includes/header.php";

?>

<main>
<?php 
$form_ruta_accion = "php/code/admin/crud-materias/crear-materias.php";
$form_titulo = "Crear Una Materia";
$form_datos = [
    [
        "label" => ["name" => "Nombre","for" => "nombre"],
        "campo" => [
            "campo_tipo" => "input",
            "id" => "nombre",
            "name" => "nombre",
            "type" => "text",
            "placeholder" => "Ingrese el nombre de la materia",
            "required" => "required",
            "autocomplete" => "name",
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
            "placeholder" => "Ingrese el curso de la materia",
            "required" => "required",
            "autocomplete" => "off",
            "minlenght" => 4,
            "maxlenght" => 10,
        ],
    ],
    [
        "label" => ["name" => "Descripcion","for" => "descripcion"],
        "campo" => [
            "campo_tipo" => "textarea",
            "id" => "descripcion",
            "name" => "descripcion",
            "placeholder" => "Ingrese la descripción de la materia",
            "required" => "required",
            "autocomplete" => "off",
            "minlenght" => 0,
            "maxlenght" => 255,
        ],
    ],
    
];
$form_nombre_boton_submit = "Crear Materia";
$form_boton_volver = ["nombre" => "Volver", "ruta" => "html/admin/crud-materias/ver-materias.php",];
require_once __DIR__ . "/../../../php/includes/formulario.php";
?>
</main>

<?php
$pop_up_error_ruta_redirigir_mensaje = "html/admin/crud-materias/crear-materias.php";
require __DIR__ . "/../../../php/includes/pop-up-error.php";

$footer_ruta_enlace_cerrar_sesion = "php/code/log/cerrar-sesion.php";
require __DIR__ . "/../../../php/includes/footer.php";
?>