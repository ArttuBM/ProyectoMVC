<?php
// Cargar Composer autoload
require __DIR__ . "/../vendor/autoload.php";

// Conectar con la base de datos
require "database.php";

use Model\ActivaModelo;
use Model\Curso;
use Model\Usuario;
use Model\Contacto;

// Inicializar conexión
$db = conectarDB();
ActivaModelo::setDB($db); // asigna la DB a todas las clases que extienden ActivaModelo
