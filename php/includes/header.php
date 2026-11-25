<?php

require_once __DIR__ . "/../includes/funciones.php";

/**
 * @var string $rutas_menu_hamburguesa 
 * URLS that show in the hamburguer menu (default: void array)
 * @var string $ruta_redirigir_error
 * URL that redirect if the file is load in the url (default: 'index.php')
 * @var bool $mostrar_buscador
 * Show the search in the header (default: false)
 * @var bool $mostrar_filtro_materia
 * Shows the subject filter in the header (default: false)
 * @var bool $mostrar_icono_usuario
 * Shows user icon in the header (default: false)
 * 
 */

$rutas_menu_hamburguesa = $rutas_menu_hamburguesa ?? [];
$ruta_redirigir_error = $ruta_redirigir_error ?? "../../index.php";

$mostrar_buscador = $mostrar_buscador ?? false;
$mostrar_filtro_materia = $mostrar_filtro_materia ?? false;
$mostrar_icono_usuario = $mostrar_icono_usuario ?? true;

if (realpath($_SERVER['SCRIPT_FILENAME']) === __FILE__) { 
    mensaje("Error","Acceso denegado",1,$ruta_redirigir_error);
}

?>
<header class="contenedor-h">
    <section class="contenedor-h">
        <img src="assets/static/img/Logo AT.png" alt="Logo Apuntes Técnicos">
        <h1>Apuntes Técnicos</h1>
    </section>
    <?php if ($mostrar_icono_usuario) { 
        echo '<img src="assets/static/img/silueta-de-multiples-usuarios.png">'; 
    } ?>
    <img src="assets/" alt="">
</header>