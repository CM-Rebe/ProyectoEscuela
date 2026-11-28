<?php define("ACCESS", true);

require_once __DIR__ . "/../../../php/includes/funciones.php";

$comprobar_sesion_tipo = "guest-persona";
$comprobar_sesion_ruta_base = "../../../";
require_once __DIR__ . "/../../../php/code/log/comprobar-sesion.php";

$head_titulo_pagina = "Editar Materia";
$head_ruta_base = "../../../";
$head_rutas_de_archivos_css = [];
require __DIR__ . "/../../../php/includes/head.php";

$header_rutas_menu_hamburguesa = [
    ["nombre" => "Panel", "habilitada" => true, "direccion" => "html/admin/panel-admin.php"],
    ["nombre" => "Perfil", "habilitada" => true, "direccion" => "html/user/perfil.php"],
    ["nombre" => "Materias", "habilitada" => true, "direccion" => "html/admin/crud-materias/ver-materias.php"],
    ["nombre" => "Crear Materia", "habilitada" => true, "direccion" => ""],
    ["nombre" => "Editar Materia", "habilitada" => false, "direccion" => "html/admin/crud-materias/editar-materias.php"],
    ["nombre" => "Eliminar Materia", "habilitada" => true, "direccion" => "html/admin/crud-materias/eliminar-materias.php"],
];
$header_mostrar_buscador = false;
$header_mostrar_filtro_materia = false;
$header_mostrar_icono_usuario = true;
require __DIR__ . "/../../../php/includes/header.php";

$materias_id = $_POST["materias_id"] ?? null;
?>

<main>
    <?php
    $form_ruta_accion = "php/code/admin/crud-materias/editar-materias.php";
    $form_titulo = "Editar Una Materia";

    $form_datos = [
        [
            "label" => ["name" => "Nombre", "for" => "nombre"],
            "campo" => [
                "campo_tipo" => "input",
                "id" => "nombre",
                "name" => "nombre",
                "type" => "text",
                "placeholder" => "Ingrese el nombre de la materia",
                "required" => "",
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
                "required" => "",
                "autocomplete" => "off",
                "minlenght" => 4,
                "maxlenght" => 10,
            ],
        ],
        [
            "label" => ["name" => "Descripcion", "for" => "descripcion"],
            "campo" => [
                "campo_tipo" => "textarea",
                "id" => "descripcion",
                "name" => "descripcion",
                "placeholder" => "Ingrese la descripción de la materia",
                "required" => "",
                "autocomplete" => "off",
                "minlenght" => 0,
                "maxlenght" => 255,
            ],
        ],

    ];
    if (isset($materias_id)) {
        $form_datos[] = 
            [
                "campo" => [
                    "campo_tipo" => "input",
                    "name" => "materias_id",
                    "type" => "hidden",
                    "value" => $materias_id,
                ]
            ];
    } else {
        $stmt = ejecutar_consulta_sql("SELECT materias_id,nombre FROM materias", []);
        $opciones = [];

        if (!empty($stmt)) {
            foreach ($stmt->fetchAll() as $fila) {
                $opciones[] = [
                    "materias_id" => $fila["nombre"],
                    "nombre" => $fila["nombre"],
                ];
            }
        }
        
        $form_datos[] = 
            [
                "label" => ["name" => "Materias", "for" => "materias_id"],
                "campo" => [
                    "id" => "materias_id",
                    "campo_tipo" => "select",
                    "name" => "materias_id",
                    "required" => "required",
                    "autocomplete" => "off",
                    "opciones" => $opciones ?? [],
                ],
            ];
    }

    $form_nombre_boton_submit = "Editar Materia";
    $form_boton_volver = ["nombre" => "Volver", "ruta" => "html/admin/crud-materias/ver-materias.php",];
    require_once __DIR__ . "/../../../php/includes/formulario.php";
    ?>
</main>

<?php
$pop_up_error_ruta_redirigir_mensaje = "html/admin/crud-materias/editar-materias.php";
require __DIR__ . "/../../../php/includes/pop-up-error.php";

$footer_ruta_enlace_cerrar_sesion = "php/code/log/cerrar-sesion.php";
require __DIR__ . "/../../../php/includes/footer.php";
?>