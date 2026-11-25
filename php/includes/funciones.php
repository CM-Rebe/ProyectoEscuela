<?php session_start(); access();

function conexion() {
    $host = 'localhost';
    $db = 'apuntes_tecncios';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';
    
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ];

    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
        return $pdo;
    } catch (PDOException $e) {
        return null;
    }
}

/**
 * Analyze and confirm the rules of your regex string
 * @param string $regex
 * An text that contains the rules of the string must respect
 * @param string $palabra
 * The string
 */
function regex_cadena(string $regex,string $palabra) : bool {
    return !preg_match("/^".$regex."$/",$palabra);
}

/**
 * Execute an sql consult
 * @param string $sql
 * An sql string consult
 * @param array $parametros
 * The sql params contained in an array
 */
function ejecutar_consulta_sql(string $sql,array $parametros) {
    try {
        $pdo = conexion();

        $stmt = $pdo->prepare($sql);
        $stmt->execute($parametros);

        return $stmt;
    } catch (PDOException $e) {
        return null;
    }
}

/**
 * Save a message and redirect an a page.
 * After called, the script FINISH.
 * @param int $tipo
 * Type of color pop-up: [1 (red)] [2 (yellow))] [3 (green)] [4 (blue)]
 */
function mensaje(string $titulo,string $texto,int $tipo,string $url) : void {
    $_SESSION["mensaje"] = [
        "titulo" => $titulo,
        "texto" => $texto,
        "tipo" => $tipo,
    ];
    header("Location: $url"); 
    exit;
}

/**
 * Return a clear text
 * @param string $cadena
 * The text to clear
 */
function e(string $cadena) : string {
    return htmlspecialchars(trim($cadena));
}

/**
 * Verify the access of the file
 */
function access() : void {
    if (!defined('ACCESS')) { 
        mensaje("???","Virus ID: YIgio80LfoVIOvoBIOvoi",1,"../../index.php"); 
    }
}