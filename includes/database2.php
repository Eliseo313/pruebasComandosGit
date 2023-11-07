<?php

function conectarBD2($nombreBD) {
    $host = 'localhost';
    $usuario = 'root';
    $contrasena = '';
    $dsn = "mysql:host=$host;dbname=$nombreBD;charset=utf8";

    try {
        $db = new PDO($dsn, $usuario, $contrasena);
        // Establece el modo de error PDO para lanzar excepciones en caso de error.
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit;
    }
}


?>