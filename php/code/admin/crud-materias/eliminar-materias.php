<?php define("ACCESS",true);

require_once __DIR__ . "/../../../includes/funciones.php";

$materias_id = $_POST["materias_id"] ?? mensaje("Error:","No se pudo acceder a la materia a eliminar",2,"../../../../html/admin/crud-materias/eliminar-materias.php"); 

$stmt = ejecutar_consulta_sql("DELETE FROM materias
WHERE materias_id = ?", [$materias_id]) 
?? mensaje("Error:","Error en la base de datos",1,"../../../../html/admin/crud-materias/eliminar-materias.php");

comprobar_datos($stmt->rowCount() === 0,["Error:","Error en la base de datos: no se pudo eliminar el producto",1,"../../../../html/admin/crud-materias/eliminar-materias.php"]);

mensaje("Éxito:","Materia eliminada",2,"../../../../html/admin/crud-materias/ver-materias.php");
