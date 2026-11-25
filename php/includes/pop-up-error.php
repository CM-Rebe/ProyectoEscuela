<?php require_once __DIR__ . "/funciones.php"; access();

/** @var string $pop_up_error_ruta_redirigir_mensaje URL that redirect an a page if the user click in the button "Entendido"*/
$pop_up_error_ruta_redirigir_mensaje = $pop_up_error_ruta_redirigir_mensaje ?? "../../index.php";

/** @var array $mensaje array that contain the information of message error*/
$mensaje = [
    "titulo" => $_SESSION["mensaje"]["titulo"] ?? null,
    "texto" => $_SESSION["mensaje"]["texto"] ?? null,
    "tipo" => $_SESSION["mensaje"]["tipo"] ?? null,
];
$_SESSION["mensaje"] = [];

if (isset($mensaje["titulo"]) && isset($mensaje["texto"])
    && isset($mensaje["tipo"])) { 
    switch ($mensaje["tipo"]) {
        case 1:
            
        break;
        case 2:
            
        break;
        case 3:
            
        break;
        case 4:
            
        break;
        default:

        break;
    }
    echo '<div class="contenedor-c">
            <article class="contenedor-v">
                <h3>'.e($mensaje["titulo"]).'</h3>
                <p>'.e($mensaje["texto"]).'</p>
                <a href="'.e($pop_up_error_ruta_redirigir_mensaje).'">Entiendo</a>
            </article>
        </div>';
}

?>