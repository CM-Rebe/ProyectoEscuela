<?php define("ACCESS",true);

require_once __DIR__ . "/../../includes/funciones.php";
session_start(); $_SESSION = [];
mensaje("Éxito:","Sesión cerrada correctamente",3,"../../../index.php");