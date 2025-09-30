<?php
namespace MVC;

class Router {
    public array $getRoutes = [];
    public array $postRoutes = [];

    // Registrar rutas GET
    public function get(string $url, $fn): void {
        $this->getRoutes[$url] = $fn;
    }

    // Registrar rutas POST
    public function post(string $url, $fn): void {
        $this->postRoutes[$url] = $fn;
    }

    // Verifica la ruta actual y ejecuta la función correspondiente
    public function ComprobarRutas(): void {
        $urlActual = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        $fn = $metodo === 'GET'
            ? ($this->getRoutes[$urlActual] ?? null)
            : ($this->postRoutes[$urlActual] ?? null);

        if ($fn) {
            if (is_array($fn)) {
                [$controllerClass, $method] = $fn;
                $controller = new $controllerClass();
                call_user_func([$controller, $method], $this);
            } else {
                call_user_func($fn, $this);
            }
        } else {
            http_response_code(404);
            echo "<h3>Página no encontrada</h3>";
        }
    }

    // Renderiza la vista con layout
    public function render(string $ubicacion, array $datos = []): void {
        ob_start();
        foreach ($datos as $key => $value) {
            $$key = $value;
        }

        // Incluir la vista específica
        include __DIR__ . "/views/{$ubicacion}.php";

        // Guardar contenido de la vista en $contenido
        $contenido = ob_get_clean();

        // Incluir layout
        include_once __DIR__ . "/views/layout.php";
    }
}
