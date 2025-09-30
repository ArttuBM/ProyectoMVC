<?php 
// 1. Primero cargamos la configuración y la DB
require __DIR__ . 'includes/app.php';

// 2. Cargamos el autoload y los namespaces
require __DIR__ . '/vendor/autoload.php';

use MVC\Router;
use Controllers\HomeController;
use Controllers\NosotrosController;
use Controllers\ServiciosController;
use Controllers\ContactoController;
use Controllers\CursoController;
use Controllers\UsuarioController;
use Controllers\LoginController;
use Controllers\CarritoController;
use Controllers\CheckoutController;
$router = new Router();

// Rutas de página estática
$router->get("/", [HomeController::class, "index"]);
$router->get("/nosotros", [NosotrosController::class, "index"]);
$router->get("/servicios", [ServiciosController::class, "index"]);

// Contacto (GET y POST)
$router->get("/contacto", [ContactoController::class, "index"]);
$router->post("/contacto", [ContactoController::class, "index"]);

// Rutas de cursos
$router->get("/cursos", [CursoController::class, "index"]);
$router->get("/cursos/crear", [CursoController::class, "crear"]);
$router->post("/cursos/crear", [CursoController::class, "crear"]);

// Rutas de usuarios
$router->get("/usuarios", [UsuarioController::class, "index"]);
$router->get("/usuarios/crear", [UsuarioController::class, "crear"]);
$router->post("/usuarios/crear", [UsuarioController::class, "crear"]);
$router->get("/usuarios/perfil", function($router) {
    $id = $_GET['id'] ?? null;
    UsuarioController::perfil($router, $id);
});

// Rutas de login
$router->get("/login", [LoginController::class, "login"]);
$router->post("/login", [LoginController::class, "login"]);
$router->get("/logout", [LoginController::class, "logout"]);

// Rutas de carrito
$router->get("/carrito", [CarritoController::class, "index"]);
$router->post("/carrito/agregar", [CarritoController::class, "agregar"]);
$router->post("/carrito/eliminar", [CarritoController::class, "eliminar"]);
$router->get("/carrito/dropdown", [CarritoController::class, "dropdown"]);

// Rutas de checkout
$router->get("/checkout", [CheckoutController::class, "index"]);
$router->post("/checkout", [CheckoutController::class, "procesar"]);

// Comprobar y ejecutar la ruta correspondiente
$router->ComprobarRutas();
