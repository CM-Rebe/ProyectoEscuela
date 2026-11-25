<?php 

require_once __DIR__ . "/../../includes/funciones.php"; 
access();

$comprobar_sesion_tipo = $comprobar_sesion_tipo ?? "guest";

$usuario = [
    "usuario_id" => $_SESSION["usuario_id"] ?? null,
    "rol" => $_SESSION["rol"] ?? null
];

function comprobar_datos (string $condition,string $url) : void {
    if ($condition) { header("Location: ".$url.""); exit; }
}

switch ($comprobar_sesion_tipo) {
    case 'guest':
        comprobar_datos(!isset($usuario["usuario_id"]),"index.php");
    break;
    case 'guest-persona':
        comprobar_datos(!isset($usuario["usuario_id"]),"index.php");
        comprobar_datos(isset($usuario["rol"]) && $usuario["rol"] === "usuario","principal.php");
    break;
    case 'persona':
        comprobar_datos(isset($usuario["rol"]) && $usuario["rol"] === "usuario","principal.php");
    break;
    case 'persona-admin':
        comprobar_datos(isset($usuario["rol"]) && $usuario["rol"] === "usuario","principal.php");
        comprobar_datos(isset($usuario["rol"]) && $usuario["rol"] === "administrador","principal.php");
    break;
    case 'guest-admin':
        comprobar_datos(!isset($usuario["usuario_id"]),"index.php");
        comprobar_datos(isset($usuario["rol"]) && $usuario["rol"] === "administrador","index.php");
    break;
}
