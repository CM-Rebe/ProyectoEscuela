<?php define("ACCESS",true);

require_once __DIR__ . "/../../../php/includes/funciones.php";

$comprobar_sesion_tipo = "guest";
$comprobar_sesion_ruta_base = "../../../";
require_once __DIR__ . "/../../../php/code/log/comprobar-sesion.php";

$head_titulo_pagina = "Editar Apunte";
$head_ruta_base = "../../../";
$head_rutas_de_archivos_css = [];
require __DIR__ . "/../../../php/includes/head.php";

$header_rutas_menu_hamburguesa = [
    ["nombre" => "Inicio", "habilitada" => true,"direccion" => "html/user/principal.php"],
    ["nombre" => "Perfil", "habilitada" => true, "direccion" => "html/user/perfil.php"],
    ["nombre" => "Apuntes", "habilitada" => true, "direccion" => "html/user/apuntes.php"],
    ["nombre" => "Grupos Estudio", "habilitada" => true, "direccion" => "html/user/gupos-estudio.php"],
    ["nombre" => "Ranking", "habilitada" => true, "direccion" => "html/user/ranking.php"],
    ["nombre" => "Mis apuntes", "habilitada" => true, "direccion" => "html/user/crud-apuntes/ver-mis-apuntes.php"],
    ["nombre" => "Crear apunte", "habilitada" => true, "direccion" => "html/user/curd-apuntes/crear-mis-apuntes.php"],
    ["nombre" => "Editar apunte", "habilitada" => false, "direccion" => "html/user/crud-apuntes/editar-mis-apuntes.php"],
    ["nombre" => "Eliminar apunte", "habilitada" => true, "direccion" => "html/user/crud-apuntes/eliminar-mis-apuntes.php"],
    ["nombre" => "Mis grupos de estudio", "habilitada" => true, "direccion" =>"html/user/crud-grupos-estudio/ver-mis-grupos-estudio.php"],
];
$header_mostrar_buscador = false;
$header_mostrar_filtro_materia = false;
$header_mostrar_icono_usuario = true;
require __DIR__ . "/../../../php/includes/header.php";

$apuntes_id = $_POST["apuntes_id"] ?? mensaje("Información:","Apunte no seleccionado, seleccione uno",4,"ver-mis-apuntes.php");
?>

<?php 
$stmt = ejecutar_consulta_sql("SELECT nombre FROM materias",[]);
$opciones = [];

if (!empty($stmt)) {
    foreach ($stmt->fetchAll() as $i => $fila) {
        $opciones[$i = $fila["nombre"]];
    }
}

$form_ruta_accion = "php/";
$form_titulo = "Editar Un Apunte";
$form_datos = [
    [
        "label" => ["name" => "","for" => ""],
        "campo" => [
            "campo_tipo" => "input",
            "name" => "apuntes_id",
            "type" => "hidden",
            "required" => "required",
        ],
    ],
    [
        "label" => ["name" => "Titulo","for" => "titulo"],
        "campo" => [
            "campo_tipo" => "input",
            "id" => "titulo",
            "name" => "titulo",
            "type" => "text",
            "placeholder" => "Ingrese el título del apunte",
            "required" => "",
            "autocomplete" => "name",
            "minlenght" => 4,
            "maxlenght" => 50,
        ],
    ],
    [
        "label" => ["name" => "Descripcion","for" => "descripcion"],
        "campo" => [
            "campo_tipo" => "textarea",
            "id" => "descripcion",
            "name" => "descripcion",
            "placeholder" => "Ingrese la descripción del apunte",
            "required" => "",
            "autocomplete" => "off",
            "minlenght" => 0,
            "maxlenght" => 255,
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
            "required" => "",
            "autocomplete" => "off",
            "minlenght" => 4,
            "maxlenght" => 10,
        ],
    ],
    [
        "label" => ["name" => "Archivo", "for" => "archivo"],
        "campo" => [
            "id" => "archivo",
            "campo_tipo" => "input",
            "name" => "archivo",
            "type" => "file",
        ],
    ],
    [
        "label" => ["name" => "Materias", "for" => "materias_id"],
        "campo" => [
            "id" => "materias_id",
            "campo_tipo" => "select",
            "name" => "materias_id",
            "required" => "",
            "autocomplete" => "off",
            "opciones" => $opciones ?? [],
        ],
    ],
];
$form_nombre_boton_submit = "Editar Apunte";
$form_boton_volver = ["nombre" => "Volver", "ruta" => "html/user/crud-apuntes/ver-mis-apuntes.php",];
require_once __DIR__ . "/../../php/includes/formulario.php";

?>

<?php
$pop_up_error_ruta_redirigir_mensaje = "html/user/crud-apuntes/editar-mis-apuntes.php";
require __DIR__ . "/../../../php/includes/pop-up-error.php";

$footer_ruta_enlace_iniciar_sesion = "";
$footer_ruta_enlace_crear_cuenta = "";
$footer_ruta_enlace_cerrar_sesion = "html/logging/cerrar-sesion.php";
require __DIR__ . "/../../../php/includes/footer.php";
?>