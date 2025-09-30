<?php
namespace Controllers;
use Model\Curso;
use MVC\Router;

class NosotrosController {

    // Página de Información Institucional
    public function index(Router $router): void
    {
        $titulo = "Sobre Nosotros";
        $descripcion = "CodeMarket es un proyecto orientado a conectar estudiantes y profesionales con cursos de programación de alta calidad. Nuestra misión es ofrecer recursos accesibles, confiables y actualizados para potenciar tus habilidades en desarrollo de software.";

        // Renderiza la vista nosotros.php pasando variables
        $router->render("nosotros", [
            "titulo" => $titulo,
            "descripcion" => $descripcion
        ]);
    }
}
