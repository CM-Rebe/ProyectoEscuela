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

/** Verify the access of the file */
function access() : void {
    if (!defined('ACCESS')) { 
        mensaje("???","Virus ID: YIgio80LfoVIOvoBIOvoi",1,"../../index.php"); 
    }
}

/**
 * Check if condition is true, execute the redirect
 * @param string $condicion the string condition
 * @param array $respuesta the values of the redirection
 */
function comprobar_datos(string $condicion, array $respuesta) {
    if ($condicion) {
        if (isset($respuesta[2])) {
            mensaje(
                $respuesta[0] ?? '',
                $respuesta[1] ?? '',
                $respuesta[2] ?? 1,
                $respuesta[3] ?? '',
            );
        }
        else { header("Location: ".($respuesta[0] ?? 'index.php').""); exit; }
    }
}

/**
 * Create an a field 
 * @param array $label the values of label settings to insert
 * @param array $campo the values of or "input" or "texarea" or "select", for be associate to the "label" and insert
 */
function crear_campo_formulario(array $label, array $campo) : void {
    echo '
    <label 
        id="'.e($label["id"] ?? "").'"
        class="'.e($label["class"] ?? "").'" 
        for="'.e($label["for"] ?? "").'"
    >'.e($label["name"] ?? "El label no tiene nombre").'
    </label>';
    
    switch ($campo["campo_tipo"] ?? "") {
        case 'input':
            echo '
                <input 
                    id="'.e($campo["id"] ?? "").'" 
                    class="'.e($campo["class"] ?? "").'" 
                    name="'.e($campo["name"] ?? "").'" 
                    type="'.e($campo["type"] ?? "text").'" 
                    placeholder="'.e($campo["placeholder"] ?? "").'" 
                    autocomplete="'.e($campo["autocomplete"] ?? "").'"
                    '.e($campo["required"] ?? "").'
                    minlenght="'.e($campo["minlenght"] ?? "").'"
                    maxlenght="'.e($campo["maxlenght"] ?? "").'"
                >
            ';
        break;
        case 'textarea':
            echo '
                <textarea 
                    id="'.e($campo["id"] ?? "").'" 
                    class="'.e($campo["class"] ?? "").'" 
                    name="'.e($campo["name"] ?? "").'" 
                    placeholder="'.e($campo["placeholder"] ?? "").'" 
                    autocomplete="'.e($campo["autocomplete"] ?? "").'"
                    '.e($campo["required"] ?? "").'
                    minlenght="'.e($campo["minlenght"] ?? "").'"
                    maxlenght="'.e($campo["maxlenght"] ?? "").'"
                ></textarea>
            ';
        break;
        case 'select':
            echo '
                <select
                    id="'.e($campo["id"] ?? "").'"
                    class="'.e($campo["class"] ?? "").'"
                    name="'.e($campo["name"] ?? "").'"
                    '.e($campo["required"] ?? "").'
                >
                    <option value="">Selecciona una materia</option>';

                foreach (($campo["opciones"] ?? []) as $i => $texto) {
                    echo '
                        <option value="'.e($i ?? "").'">'.e($texto ?? "").'</option>';
                }

            echo '
                </select>
            ';
        break;
        default: echo 'campo no seleccionado'; break;
    }
}

?>