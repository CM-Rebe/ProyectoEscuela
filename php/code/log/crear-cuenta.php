<?php

require_once __DIR__ . "/../../includes/funciones.php";

$nombre = $_POST["nombre"] ?? mensaje("Error:","Falta completar el nombre",2,"../../../html/");
$apellido = $_POST["apellido"] ?? mensaje("Error:","Falta completar el apellido",2,"../../../html/");
$curso = $_POST["curso"] ?? mensaje("Error:","Falta completar el curso",2,"../../../html/");
$email = $_POST["email"] ?? mensaje("Error:","Falta completar el email",2,"../../../html/");
$clave = $_POST["clave"] ?? mensaje("Error:","Falta completar la clave",2,"../../../html/");

function comprobar_datos(string $regex, $dato, string $campo) {
    if (empty($dato) || regex_cadena($regex,$dato)) {
        mensaje("Error:","Los datos del ".$campo." no cumplen con el formato solicitado",2,"");
    }
}

comprobar_datos("[a-zA-Z0-9_-]{4,50}",$nombre,"nombre");
comprobar_datos("[a-zA-Z0-9_-]{4,50}",$apellido,"apellido");
comprobar_datos("[0-9][a-zA-Z0-9°_-* ]{1,3}[0-9][a-zA-Z°_-*]{0,3}",$curso,"curso");
comprobar_datos("[a-zA-Z0-9_-]{4,50}@[a-zA-Z0-9]{1,50}.com(.ar){0,1}",$email,"email");
comprobar_datos("[a-zA-Z0-9.,_-]{4,50}",$clave,"clave");

$stmt = ejecutar_consulta_sql("SELECT usuario_id FROM usuarios
WHERE email = ?", [$email]) 
?? mensaje("Error:","Error en la base de datos",1,"../../../html/");

$usuario_que_puede_existir = $stmt->fetch();

if (!empty($usuario_que_puede_existir)) {
    mensaje("Error:","Usuario existente",2,"../../../html/");
}

$clave_hash = password_hash($clave,PASSWORD_DEFAULT);

$stmt = ejecutar_consulta_sql("INSERT INTO usuarios
(nombre,apellido,curso,email,clave) VALUES
(?,?,?,?,?)", [$nombre,$apellido,$curso,$email,$clave_hash]) 
?? mensaje("Error:","Error en la base de datos",1,"../../../html/");

if ($stmt->rowCount() === 0) {
    mensaje("Error:","Hubo un error al insertar el usuario",1,"../../../html/");
}

$stmt = ejecutar_consulta_sql("SELECT usuario_id,rol FROM usuarios
WHERE email = ?", [$email]) 
?? mensaje("Error:","Error en la base de datos",1,"../../../html/");

$usuario = $stmt->fetch();

$_SESSION["usuario_id"] = $usuario["usuario_id"];
$_SESSION["rol"] = $usuario["rol"];

if ($usuario["rol"] === "administrador") {
    mensaje("Éxito:","Cuenta creada y sesión iniciada correctamente, Bienvenido Admin".$usuario["nombre"]."",2,"../../../html/");
}
else {
    mensaje("Éxito:","Cuenta creada y sesión iniciada correctamente, Bienvenido ".$usuario["nombre"]."",2,"../../../html/");
}