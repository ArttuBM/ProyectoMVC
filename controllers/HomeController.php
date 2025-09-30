<?php
namespace Controllers;

use Model\Curso;
use MVC\Router;

class HomeController {

    // Página de inicio
    public function index(Router $router): void
    {
        // Renderiza la vista home.php pasando variables
        $router->render("home")
        ;
    }
}
