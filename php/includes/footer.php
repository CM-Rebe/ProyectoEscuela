<?php require_once __DIR__ . "/funciones.php"; access(); 

/** @var string $footer_ruta_enlace_iniciar_sesion decide the link of the file "iniciar-sesion.php"*/
$footer_ruta_enlace_iniciar_sesion = $footer_ruta_enlace_iniciar_sesion ?? "";

/** @var string $footer_ruta_enlace_crear_cuenta decide the link of the file "crear-cuenta.php"*/
$footer_ruta_enlace_crear_cuenta = $footer_ruta_enlace_crear_cuenta ?? "";

/** @var string $footer_ruta_enlace_cerrar_sesion decide the link of the file "cerrar-sesión.php"*/
$footer_ruta_enlace_cerrar_sesion = $footer_ruta_enlace_cerrar_sesion ?? "";

?>

<footer class="contenedor-h justify-evenly wrap">
    <section class="contenedor-c">
        <p>&copy; Apuntes Técnicos 2026. Todos los derechos reservados</p>
    </section>
    <section class="contenedor-v">
        <p>Esta página está hecha por:</p>
        <article>
            <p>Cejas Molina Rebecca</p>
            <p>Luppini Matías</p>
        </article>
    </section>
    <section class="contenedor-v justify-evenly">
        <?php if (!isset($_SESSION["usuario_id"])) {
            if (!empty($footer_ruta_enlace_iniciar_sesion)) {
                echo '<a href="'.e($footer_ruta_enlace_iniciar_sesion).'">Inicia Sesión</a>';
            }
            if (!empty($footer_ruta_enlace_crear_cuenta)) {
                echo '
                <article class="contenedor-v">
                    <p>¿No tienes cuenta?</p>
                    <a href="'.e($footer_ruta_enlace_crear_cuenta).'">Crea una cuenta</a>
                </article> ';
            }
        } else { echo '<a href="">Cerrar sesión</a>'; } ?>
    </section>
</footer>

</body>
</html>