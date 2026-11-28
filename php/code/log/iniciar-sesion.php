<?php define("ACCESS",true);

require_once __DIR__ . "/../../includes/funciones.php";

$email = $_POST["email"] ?? mensaje("Error:","Falta completar el email",2,"../../../html/");
$clave = $_POST["clave"] ?? mensaje("Error:","Falta completar la clave",2,"../../../html/");

comprobar_datos(empty($email) || regex_cadena("[a-zA-Z0-9_.,-]{4,50}@[a-zA-Z0-9]{1,50}.com(.ar){0,1}",$email),["Error:","Los datos del email no cumplen con el formato solicitado",2,"../../../html/logging/crear-cuenta.php"]);
comprobar_datos(empty($clave) || regex_cadena("[a-zA-Z0-9_.,-]{4,50}",$clave),["Error:","Los datos de la clave no cumplen con el formato solicitado",2,"../../../html/logging/crear-cuenta.php"]);

$stmt = ejecutar_consulta_sql("SELECT usuarios_id,nombre,rol,clave FROM usuarios
WHERE email = ?", [$email])
?? mensaje("Error:","Error en la base de datos",1,"../../../html/logging/iniciar-sesion.php");

$usuario = $stmt->fetch();

if (empty($usuario)) {
    mensaje("Error:","Usuario inexistente",2,"../../../html/logging/iniciar-sesion.php");
}

if (!password_verify($clave,$usuario["clave"])) {
    mensaje("Error:","No tienes acceso a esta cuenta",2,"../../../html/logging/iniciar-sesion.php");
}

$_SESSION["usuarios_id"] = $usuario["usuarios_id"];
$_SESSION["rol"] = $usuario["rol"];

if ($usuario["rol"] === "administrador") {
    mensaje("Éxito:","Sesión iniciada correctamente, Bienvenido Admin ".$usuario["nombre"]."",2,"../../../html/admin/panel-admin.php");
}
else {
    mensaje("Éxito:","Sesión iniciada correctamente, Bienvenido ".$usuario["nombre"]."",2,"../../../html/user/principal.php");
}