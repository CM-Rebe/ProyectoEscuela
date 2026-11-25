<?php

session_start();

$_SESSION = [];

session_destroy();

mensaje("Éxito:","Sesión cerrada correctamente",3,"../../../index.php");