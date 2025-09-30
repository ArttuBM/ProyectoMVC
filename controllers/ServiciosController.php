<?php
namespace Controllers;

use MVC\Router;
use Model\Curso;

class ServiciosController {

    // Listar todos los cursos
    public static function index(Router $router): void
    {
        $cursos = Curso::listar(); // ya tiene DB asignada
        $router->render("servicios/index", [
            "cursos" => $cursos
        ]);
    }
}
