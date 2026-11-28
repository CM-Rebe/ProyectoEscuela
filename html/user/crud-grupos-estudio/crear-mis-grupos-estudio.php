<?php define("ACCESS",true);

require_once __DIR__ . "/../../../php/includes/funciones.php";

$comprobar_sesion_tipo = "guest";
$comprobar_sesion_ruta_base = "../../../";
require_once __DIR__ . "/../../../php/code/log/comprobar-sesion.php";

$head_titulo_pagina = "Crear Grupos";
$head_ruta_base = "../../../";
$head_rutas_de_archivos_css = [];
require __DIR__ . "/../../../php/includes/head.php";

$header_rutas_menu_hamburguesa = [
    ["nombre" => "Inicio", "habilitada" => true,"direccion" => "html/user/principal.php"],
    ["nombre" => "Perfil", "habilitada" => true, "direccion" => "html/user/perfil.php"],
    ["nombre" => "Apuntes", "habilitada" => true, "direccion" => "html/user/apuntes.php"],
    ["nombre" => "Grupos Estudio", "habilitada" => true, "direccion" => "html/user/grupos-estudio.php"],
    ["nombre" => "Ranking", "habilitada" => true, "direccion" => "html/user/ranking.php"],
    ["nombre" => "Mis apuntes", "habilitada" => true, "direccion" => "html/user/curd-apuntes/ver-mis-apuntes.php"],
    ["nombre" => "Mis grupos de estudio", "habilitada" => true, "direccion" =>"html/user/crud-grupos-estudio/ver-mis-grupos-estudio.php"],
    ["nombre" => "Crear grupos de estudio", "habilitada" => false, "direccion" =>"html/user/crud-grupos-estudio/crear-mis-grupos-estudio.php"],
    ["nombre" => "Editar grupos de estudio", "habilitada" => true, "direccion" =>"html/user/crud-grupos-estudio/editar-mis-grupos-estudio.php"],
    ["nombre" => "Eliminar grupos de estudio", "habilitada" => true, "direccion" =>"html/user/crud-grupos-estudio/eliminar-mis-grupos-estudio.php"],
];
$header_mostrar_buscador = false;
$header_mostrar_filtro_materia = false;
$header_mostrar_icono_usuario = true;
require __DIR__ . "/../../../php/includes/header.php";
?>

<main>
<?php 
$stmt = ejecutar_consulta_sql("SELECT materias_id,nombre FROM materias",[]);
$opciones = [];

if (!empty($stmt)) {
    foreach ($stmt->fetchAll() as $fila) {
        $opciones[] = [
            "materias_id" => $fila["nombre"],
            "nombre" => $fila["nombre"],
        ];
    }
}

$form_ruta_accion = "php/";
$form_titulo = "Crea un Grupo de Estudio";
$form_datos = [
    [
        "label" => ["name" => "Materia", "for" => "materias_id"],
        "campo" => [
            "campo_tipo" => "select",
            "id" => "materias_id",
            "name" => "materias_id",
            "required" => "required",
            "opciones" => $opciones ?? [],
        ],
    ],
    [
        "campo" => [
            "campo_tipo" => "input",
            "id" => "usuarios_id",
            "name" => "usuarios_id",
            "type" => "hidden",
            "required" => "required",
            "value" => $_SESSION["usuarios_id"] ?? "",
        ],
    ],
    [
        "label" => ["name" => "Tema a repasar", "for" => "tema_repasar"],
        "campo" => [
            "campo_tipo" => "input",
            "id" => "tema_repasar",
            "name" => "tema_repasar",
            "type" => "text",
            "placeholder" => "Ingrese el tema a repasar",
            "required" => "required",
            "autocomplete" => "off",
            "minlength" => 4,
            "maxlength" => 50,
        ],
    ],
    [
        "label" => ["name" => "Fecha", "for" => "fecha"],
        "campo" => [
            "campo_tipo" => "input",
            "id" => "fecha",
            "name" => "fecha",
            "type" => "datetime-local",
            "required" => "required",
            "autocomplete" => "off",
        ],
    ],
    [
        "label" => ["name" => "Hora", "for" => "hora"],
        "campo" => [
            "campo_tipo" => "input",
            "id" => "hora",
            "name" => "hora",
            "type" => "datetime-local",
            "required" => "required",
            "autocomplete" => "off",
        ],
    ],
    [
        "label" => ["name" => "Lugar", "for" => "lugar"],
        "campo" => [
            "campo_tipo" => "input",
            "id" => "lugar",
            "name" => "lugar",
            "type" => "text",
            "placeholder" => "Ingrese el lugar del encuentro",
            "required" => "required",
            "autocomplete" => "off",
            "minlength" => 4,
            "maxlength" => 50,
        ],
    ],
    [
        "label" => ["name" => "Cantidad máxima", "for" => "cantidad_maxima"],
        "campo" => [
            "campo_tipo" => "input",
            "id" => "cantidad_maxima",
            "name" => "cantidad_maxima",
            "type" => "number",
            "placeholder" => "Ingrese el límite de integrantes",
            "required" => "required",
            "autocomplete" => "off",
            "min" => 2,
            "max" => 30,
        ],
    ],
];
$form_nombre_boton_submit = "Crear Grupo de Estudio";
$form_boton_volver = ["nombre" => "Volver", "ruta" => "html/user/crud-grupos-estudio/ver-mis-grupos-estudio.php",];
require_once __DIR__ . "/../../../php/includes/formulario.php";

?>
</main>

<?php
$pop_up_error_ruta_redirigir_mensaje = "html/user/crud-grupos-estudio/crear-mis-grupos-estudio.php";
require __DIR__ . "/../../../php/includes/pop-up-error.php";

$footer_ruta_enlace_iniciar_sesion = "";
$footer_ruta_enlace_crear_cuenta = "";
$footer_ruta_enlace_cerrar_sesion = "html/logging/cerrar-sesion.php";
require __DIR__ . "/../../../php/includes/footer.php";
?>