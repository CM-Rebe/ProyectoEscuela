<?php

require_once __DIR__ . "/funciones.php";

if (realpath($_SERVER['SCRIPT_FILENAME']) === __FILE__) { 
    mensaje("Error","Acceso denegado",1,"../../index.php");
}

?>

<footer class="contenedor-h justify-evenly wrap">
    <article class="contenedor-c">
        <p>&copy; Apuntes Técnicos 2026. Todos los derechos reservados</p>
    </article>
    <section class="contenedor-v">
        <p>Esta página está hecha por:</p>
        <article>
            <p>Cejas Molina Rebecca</p>
            <p>Luppini Matías</p>
        </article>
    </section>
    <section class="contenedor-v justify-evenly">
        <a href="">Inicia Sesión</a>
        <section class="contenedor-v">
            <p>¿No tienes cuenta?</p>
            <a href="">Crea una cuenta</a>
        </section>
    </section>
</footer>

</body>
</html>