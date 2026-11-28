<?php 

require_once __DIR__ . "/../../includes/funciones.php"; 
access();

/** @var string $comprobar_sesion_tipo define the type of "rol" what define your access (admin,persona,guest) */
$comprobar_sesion_tipo = $comprobar_sesion_tipo ?? "guest";

/** @var string $comprobar_sesion_ruta_base define the base route to redirect guests,users and admins */
$comprobar_sesion_ruta_base = $comprobar_sesion_ruta_base ?? "";

$usuario = [
    "usuarios_id" => $_SESSION["usuarios_id"] ?? null,
    "rol" => $_SESSION["rol"] ?? null
];

switch ($comprobar_sesion_tipo) {
    case 'guest':
        comprobar_datos(!isset($usuario["usuarios_id"]),[$comprobar_sesion_ruta_base."index.php"]);
    break;
    case 'guest-persona':
        comprobar_datos(!isset($usuario["usuarios_id"]),[$comprobar_sesion_ruta_base."index.php"]);
        comprobar_datos(isset($usuario["rol"]) && $usuario["rol"] === "usuario",[$comprobar_sesion_ruta_base."html/user/principal.php"]);
    break;
    case 'persona':
        comprobar_datos(isset($usuario["rol"]) && $usuario["rol"] === "usuario",[$comprobar_sesion_ruta_base."html/user/principal.php"]);
    break;
    case 'persona-admin':
        comprobar_datos(isset($usuario["rol"]) && $usuario["rol"] === "usuario",[$comprobar_sesion_ruta_base."html/user/principal.php"]);
        comprobar_datos(isset($usuario["rol"]) && $usuario["rol"] === "administrador",[$comprobar_sesion_ruta_base."html/admin/panel-admin.php"]);
    break;
    case 'guest-admin':
        comprobar_datos(!isset($usuario["usuarios_id"]),[$comprobar_sesion_ruta_base."index.php"]);
        comprobar_datos(isset($usuario["rol"]) && $usuario["rol"] === "administrador",[$comprobar_sesion_ruta_base."html/admin/panel-admin.php"]);
    break;
}