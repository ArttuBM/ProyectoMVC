<?php
namespace Controllers;

use MVC\Router;
use Model\Usuario;

class LoginController {

    // Mostrar login y procesar autenticación
    public function login(Router $router): void
    {
        if(session_status() !== PHP_SESSION_ACTIVE) session_start();
        $errores = [];

        // Si ya está logueado, redirige a cursos
        if (!empty($_SESSION['usuario_id'])) {
            header("Location: /cursos");
            exit;
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $auth = new Usuario([
                'email' => $email,
                'password' => $password
            ]);

            // Validar solo email y contraseña
            $errores = $auth->validarLogin();

            if (empty($errores)) {
                $resultado = $auth->existeUsuario(); // devuelve objeto o false
                if ($resultado !== false && $auth->comprobarPassword($resultado)) {
                    $auth->autenticar(); // Guarda sesión y redirige a /cursos
                } else {
                    $errores = Usuario::getErrores();
                }
            }
        }

        $router->render("auth/login", [
            "errores" => $errores
        ]);
    }

    // Cerrar sesión
    public function logout(): void
    {
        if(session_status() !== PHP_SESSION_ACTIVE) session_start();
        $_SESSION = [];
        session_destroy();
        header("Location: /login");
        exit;
    }
}
