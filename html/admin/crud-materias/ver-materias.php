<?php define("ACCESS",true);

require_once __DIR__ . "/../../../php/includes/funciones.php";

$comprobar_sesion_tipo = "guest-persona";
$comprobar_sesion_ruta_base = "../../../";
require_once __DIR__ . "/../../../php/code/log/comprobar-sesion.php";

$head_titulo_pagina = "Ver Materias";
$head_ruta_base = "../../../";
$head_rutas_de_archivos_css = [];
require __DIR__ . "/../../../php/includes/head.php";

$header_rutas_menu_hamburguesa = [
    ["nombre" => "Panel", "habilitada" => true,"direccion" => "html/admin/panel-admin.php"],
    ["nombre" => "Perfil", "habilitada" => true, "direccion" => "html/user/perfil.php"],
    ["nombre" => "Materias", "habilitada" => false, "direccion" => ""],
    ["nombre" => "Crear Materia", "habilitada" => true, "direccion" => "html/admin/crud-materias/crear-materias.php"],
    ["nombre" => "Editar Materia", "habilitada" => true, "direccion" => "html/admin/crud-materias/editar-materias.php"],
    ["nombre" => "Eliminar Materia", "habilitada" => true, "direccion" => "html/admin/crud-materias/eliminar-materias.php"],
];
$header_mostrar_buscador = true;
$header_mostrar_filtro_materia = false;
$header_mostrar_icono_usuario = true;
require __DIR__ . "/../../../php/includes/header.php";

$stmt = ejecutar_consulta_sql("SELECT materias_id,nombre,curso,descripcion FROM materias",[]);
?>

<main>
    <h2>Materias Existentes:</h2>
    <?php foreach ($stmt->fetchAll() ?? [] as $i => $materias) {
        echo '
        <article>
            <h3>'.e($materias["nombre"]).''.e($materias["curso"]).'</h3>
            <p>'.e($materias["descripcion"]).'</p>
            <form action="html/admin/crud-materias/editar-materias.php" method="POST">
                <input type="hidden" name="materias_id" value="'.e($materias["materias_id"]).'">
                <button type="submit">Editar</button>
            </form>
            <form action="html/admin/crud-materias/eliminar-materias.php" method="POST">
                <input type="hidden" name="materias_id" value="'.e($materias["materias_id"]).'">
                <button type="submit">Eliminar</button>
            </form>
        </article>
        ';
    }

    ?>
</main>

<?php
$pop_up_error_ruta_redirigir_mensaje = "html/admin/crud-materias/ver-materias.php";
require __DIR__ . "/../../../php/includes/pop-up-error.php";

$footer_ruta_enlace_cerrar_sesion = "php/code/log/cerrar-sesion.php";
require __DIR__ . "/../../../php/includes/footer.php";
?>