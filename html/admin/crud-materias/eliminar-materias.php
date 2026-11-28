<?php define("ACCESS", true);

require_once __DIR__ . "/../../../php/includes/funciones.php";

$comprobar_sesion_tipo = "guest-persona";
$comprobar_sesion_ruta_base = "../../../";
require_once __DIR__ . "/../../../php/code/log/comprobar-sesion.php";

$head_titulo_pagina = "Eliminar Materia";
$head_ruta_base = "../../../";
$head_rutas_de_archivos_css = [];
require __DIR__ . "/../../../php/includes/head.php";

$header_rutas_menu_hamburguesa = [
    ["nombre" => "Panel", "habilitada" => true, "direccion" => "html/admin/panel-admin.php"],
    ["nombre" => "Perfil", "habilitada" => true, "direccion" => "html/user/perfil.php"],
    ["nombre" => "Materias", "habilitada" => true, "direccion" => "html/admin/crud-materias/ver-materias.php"],
    ["nombre" => "Crear Materia", "habilitada" => true, "direccion" => "html/admin/crud-materias/crear-materias.php"],
    ["nombre" => "Editar Materia", "habilitada" => true, "direccion" => "html/admin/crud-materias/editar-materias.php"],
    ["nombre" => "Eliminar Materia", "habilitada" => false, "direccion" => "html/admin/crud-materias/eliminar-materias.php"],
];
$header_mostrar_buscador = false;
$header_mostrar_filtro_materia = false;
$header_mostrar_icono_usuario = true;
require __DIR__ . "/../../../php/includes/header.php";

$materias_id = $_POST["materias_id"] ?? null;

?>

<main>
    <?php
    if (isset($materias_id)) {
        $form_titulo = "¿Estás seguro de eliminar la materia?";
        $form_datos = [
            [
                "label" => ["nombre" => "", "for" => ""],
                "campo" => [
                    "campo_tipo" => "input",
                    "name" => "materias_id",
                    "type" => "hidden",
                    "value" => $materias_id,
                ],
            ],

        ];
    } else {
        $stmt = ejecutar_consulta_sql("SELECT materias_id,nombre FROM materias", []);
        $form_titulo = "Eliminar materia";
        $form_datos = [
            [
                "label" => ["name" => "Materias", "for" => "materias_id"],
                "campo" => [
                    "id" => "materias_id",
                    "campo_tipo" => "select",
                    "name" => "materias_id",
                    "type" => "hidden",
                    "required" => "required",
                    "autocomplete" => "off",
                    "opciones" => $stmt->fetchAll() ?? [],
                ],
            ],
        ];
    }
    $form_ruta_accion = "php/code/admin/crud-materias/eliminar-materias.php";

    $form_nombre_boton_submit = "Eliminar Materia";
    $form_boton_volver = ["nombre" => "Volver", "ruta" => "html/admin/crud-materias/ver-materias.php",];
    require_once __DIR__ . "/../../../php/includes/formulario.php";
    ?>
</main>

<?php
$pop_up_error_ruta_redirigir_mensaje = "html/admin/crud-materias/eliminar-materias.php";
require __DIR__ . "/../../../php/includes/pop-up-error.php";

$footer_ruta_enlace_cerrar_sesion = "php/code/log/cerrar-sesion.php";
require __DIR__ . "/../../../php/includes/footer.php";
?>