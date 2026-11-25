<?php

require_once __DIR__ . "/funciones.php";

if (realpath($_SERVER['SCRIPT_FILENAME']) === __FILE__) { 
    mensaje("Error","Acceso denegado",1,"../../index.php");
}

/** @var array $header_rutas_menu_hamburguesa URLS that show in the hamburguer menu */
$header_rutas_menu_hamburguesa = $rutas_menu_hamburguesa ?? [];

/** @var bool $header_mostrar_buscador Show the search in the header */
$header_mostrar_buscador = $mostrar_buscador ?? false;

/** @var bool $header_mostrar_filtro_materia Shows the subject filter in the header */
$header_mostrar_filtro_materia = $mostrar_filtro_materia ?? false;

/** @var bool $header_mostrar_icono_usuario Shows user icon in the header */
$header_mostrar_icono_usuario = $mostrar_icono_usuario ?? true;

?>
<header class="contenedor-h">
    <section class="contenedor-h">
        <?php if (!empty($header_rutas_menu_hamburguesa)) {
            echo ' <button class="contenedor-v">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button> ';
        } ?>
        <img src="assets/static/img/Logo AT.png" alt="Logo Apuntes Técnicos">
        <h1>Apuntes Técnicos</h1>
    </section>
    <?php if (!empty($header_mostrar_buscador)) { 
        echo '<img src="assets/static/img/silueta-de-multiples-usuarios.png" alt="Logo usuario">'; 
    } ?>
</header>

<?php if (!empty($header_rutas_menu_hamburguesa)) {

} ?>