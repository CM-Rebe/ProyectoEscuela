<?php require_once __DIR__ . "/funciones.php"; access(); 

/** @var string $form_ruta_accion the route to send POST body values"*/
$form_ruta_accion = $form_ruta_accion ?? "";

/** @var string $form_titulo the title of the form"*/
$form_titulo = $form_titulo ?? "";

/**
 * @var array $form_datos Field form list. Many element contain "label" y "campo".
 *
 * "label":
 * - "id" => string
 * - "class" => string
 * - "name" => string
 * - "for" => string
 *
 * "campo" ("campo_tipo" => "input"):
 * - "campo_tipo" => string ("input")
 * - "id" => string
 * - "class" => string
 * - "name" => string
 * - "type" => string
 * - "placeholder" => string
 * - "required" => string ("required" o "")
 * - "autocomplete" => string
 * - "minlenght" => int
 * - "maxlenght" => int
 *
 * "campo" ("campo_tipo" => "textarea"):
 * - "campo_tipo" => string ("textarea")
 * - "id" => string
 * - "class" => string
 * - "name" => string
 * - "placeholder" => string
 * - "required" => string ("required" o "")
 * - "autocomplete" => string
 * - "minlenght" => int
 * - "maxlenght" => int
 *
 * "campo" ("campo_tipo" => "select"):
 * - "campo_tipo" => string ("select")
 * - "id" => string
 * - "class" => string
 * - "name" => string
 * - "required" => string ("required" o "")
 * - "opciones" => string
 */

$form_datos = $form_datos ?? [
    [
        "label" => [

        ],
        "campo" => [

        ],
    ],
];

/** @var string $form_nombre_boton_submit an array that contain the params of the submit button"*/
$form_nombre_boton_submit = $form_nombre_boton_submit ?? "Subir";

/** @var array $form_boton_volver an array that contain the params of "volver" button (link + name)"*/
$form_boton_volver = $form_boton_volver ?? ["nombre" => "","ruta" => ""];

?>

<form action="<?= e($form_ruta_accion) ?>" method="POST">
    <h2><?= e($form_titulo) ?></h2>
    <?php foreach ($form_datos as $estructura_campo) {
        crear_campo_formulario(
            $estructura_campo["label"] ?? [],
            $estructura_campo["campo"] ?? [],
        );
    } ?>
    <button type="submit"><?= e($form_nombre_boton_submit) ?></button>
    <a href="<?= e($form_boton_volver["ruta"]) ?>"><?= e($form_boton_volver["nombre"]) ?></a>
</form>