<?php

require_once __DIR__ . "/funciones.php";

if (realpath($_SERVER['SCRIPT_FILENAME']) === __FILE__) {
    mensaje("Error","Acceso denegado",1,"../../index.php");
}

$pop_up_error_ruta_redirigir_mensaje = $pop_up_error_ruta_redirigir_mensaje ?? "../../index.php";

$error_mensaje = $_SESSION["mensaje"] ?? mensaje("Error:","",2,$pop_up_error_ruta_redirigir_mensaje);;
$_SESSION["mensaje"] = [];

switch ($error_mensaje["tipo"]) {
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

?>