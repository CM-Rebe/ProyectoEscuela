<?php define("ACCESS",true);

require_once __DIR__ . "/../../../includes/funciones.php";

$materias_id = $_POST["materias_id"] ?? mensaje("Error:","No se pudo acceder a la materia a editar",2,"../../../../html/admin/crud-materias/editar-materias.php"); 
$nombre = $_POST["nombre"] ?? null;
$curso = $_POST["curso"] ?? null;
$descripcion = $_POST["descripcion"] ?? null;

function actualizar_columna(string $columna,mixed $dato,int $materias_id) {
    if (isset($dato)) {
        $stmt = ejecutar_consulta_sql("UPDATE materias
        SET ".$columna." = ? WHERE materias_id = ?", [$dato,$materias_id]) 
        ?? mensaje("Error:","Error en la base de datos",1,"../../../../html/admin/crud-materias/editar-materias.php");
        if ($stmt->rowCount() > 0) {return 1;}
        return 0;
    }
}

$hubo_actualizacion = 0;
$hubo_actualizacion += actualizar_columna("nombre",$nombre,$materias_id);
$hubo_actualizacion += actualizar_columna("curso",$curso,$materias_id);
$hubo_actualizacion += actualizar_columna("descripcion",$descripcion,$materias_id);

comprobar_datos($hubo_actualizacion === 0,["Información","No se actualizó ni modificó nada debido a que los datos eran iguales o no habían",4,"../../../../html/admin/crud-materias/editar-materias.php"]);

mensaje("Éxito:","Materia modificada",2,"../../../../html/admin/crud-materias/ver-materias.php");
