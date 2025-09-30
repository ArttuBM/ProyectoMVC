<?php
namespace Controllers;

use MVC\Router;
use Model\Contacto;

class ContactoController {

    // Página de Contacto
    public function index(Router $router): void
    {
        $titulo = "Contacto";
        $mensaje = "Si tienes alguna duda, sugerencia o consulta, por favor completa el formulario y nos pondremos en contacto contigo.";

        $errores = [];
        $exito = false;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Filtrar y obtener datos del formulario
            $postData = filter_input_array(INPUT_POST, [
                "nombre" => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                "email" => FILTER_SANITIZE_EMAIL,
                "asunto" => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                "mensaje" => FILTER_SANITIZE_FULL_SPECIAL_CHARS
            ]) ?? [];

            $contacto = new Contacto($postData);
            
            // Validar campos obligatorios
            $errores = $contacto->validar();

            if (empty($errores)) {
                // Guardar en DB usando la función crear() que devuelve bool
                if ($contacto->crear()) {
                    $exito = true;
                } else {
                    // Si hay error en la DB, agregamos a errores
                    $errores = Contacto::getErrores();
                }
            }
        }

        $router->render("contacto", [
            "titulo" => $titulo,
            "mensaje" => $mensaje,
            "errores" => $errores,
            "exito" => $exito
        ]);
    }
}
    