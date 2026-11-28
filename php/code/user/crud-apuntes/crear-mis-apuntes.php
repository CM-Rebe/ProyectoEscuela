<?php define("ACCESS",true);

require_once __DIR__ . "/../../../includes/funciones.php";

$titulo = $_POST["titulo"] ?? mensaje("Error:","Falta completar el titulo",2,"../../../../html/user/crud-apuntes/crear-mis-apuntes.php");

$curso = $_POST["curso"] ?? mensaje("Error:","Falta completar el curso",2,"../../../../html/user/crud-apuntes/crear-mis-apuntes.php");
$descripcion = $_POST["descripcion"] ?? mensaje("Error:","Falta completar la descripción",2,"../../../../html/user/crud-apuntes/crear-mis-apuntes.php");

comprobar_datos(empty($nombre) || regex_cadena("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑüÜ]{4,50}",$nombre),["Error:","Los datos del nombre no cumplen con el formato solicitado",2,"../../../../html/admin/crud-materias/crear-materias.php"]);
comprobar_datos(empty($curso) || regex_cadena("[0-9][a-zA-Z0-9°_*-]{1,3}[0-9][a-zA-Z°_*-]{0,3}",$curso),["Error:","Los datos del curso no cumplen con el formato solicitado",2,"../../../../html/admin/crud-materias/crear-materias.php"]);
comprobar_datos(empty($descripcion) || regex_cadena("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑüÜ\s.,;:¡!¿?()\-_']{10,500}",$descripcion),["Error:","Los datos de la descripcion no cumplen con el formato solicitado",2,"../../../../html/admin/crud-materias/crear-materias.php"]);

$stmt = ejecutar_consulta_sql("INSERT INTO materias
(nombre,curso,descripcion) VALUES
(?,?,?)", [$curso,$descripcion]) 
?? mensaje("Error:","Error en la base de datos",1,"../../../../html/user/crud-apuntes/crear-mis-apuntes.php");

comprobar_datos($stmt->rowCount() === 0,["Error:","Hubo un error al insertar la materia",1,"../../../../html/user/crud-apuntes/crear-mis-apuntes.php"]);

mensaje("Éxito:","Apunte creado",3,"../../../../html/user/crud-apuntes/crear-mis-apuntes.php");
