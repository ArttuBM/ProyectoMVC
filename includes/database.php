<?php
function conectarDB(): mysqli {
    $servidor = "localhost";
    $usuario = "root";
    $contrasena = "";
    $bd = "marketplace_cursos"; // Nombre de la base de datos

    // Crear conexión
    $db = new mysqli($servidor, $usuario, $contrasena, $bd);

    // Comprobar errores de conexión
    if ($db->connect_error) {
        throw new Exception("Error de conexión: " . $db->connect_error);
    }

    // Configurar charset para evitar problemas con acentos y emojis
    $db->set_charset("utf8mb4");

    return $db;
}
