<?php require_once __DIR__ . "/funciones.php"; access();

/** @var array $header_rutas_menu_hamburguesa URLS that show in the hamburguer menu */
$header_rutas_menu_hamburguesa = $header_rutas_menu_hamburguesa ?? [];

/** @var bool $header_mostrar_buscador Show the search in the header */
$header_mostrar_buscador = $header_mostrar_buscador ?? false;

/** @var bool $header_mostrar_filtro_materia Shows the subject filter in the header */
$header_mostrar_filtro_materia = $header_mostrar_filtro_materia ?? false;

/** @var bool $header_mostrar_icono_usuario Shows user icon in the header */
$header_mostrar_icono_usuario = $header_mostrar_icono_usuario ?? false;

?>
<header class="contenedor-h">
    <section class="contenedor-h">
        <?php if ($header_rutas_menu_hamburguesa) {
            echo ' <button class="contenedor-v">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button> ';
        } ?>
        <img src="assets/static/img/Logo AT.png" alt="Logo Apuntes Técnicos">
        <h1>Apuntes Técnicos</h1>
    </section>
    <?php if ($header_mostrar_icono_usuario) { 
        echo '<img src="assets/static/img/silueta-de-multiples-usuarios.png" alt="Logo usuario">'; 
    } ?>
    <?php if ($header_mostrar_icono_usuario) { 
        echo '<img src="assets/static/img/silueta-de-multiples-usuarios.png" alt="Logo usuario">'; 
    } ?>
</header>

<?php if (!empty($header_rutas_menu_hamburguesa)) {
    echo '<aside class="contenedor-v">';
    foreach ($header_rutas_menu_hamburguesa as $rutas) {
        echo '';
    }
    echo '</aside>';
} ?>

<aside class="contenedor-v">
    
</aside>