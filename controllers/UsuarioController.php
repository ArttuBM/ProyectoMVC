<?php
namespace Controllers;

use MVC\Router;
use Model\Usuario;

class UsuarioController {

    // Listar todos los usuarios (freelancers o estudiantes)
    public static function index(Router $router): void
    {
        $usuarios = Usuario::listar();
        $router->render("usuarios/index", [
            "usuarios" => $usuarios
        ]);
    }

    // Crear un nuevo usuario (registro)
    public static function crear(Router $router): void
    {
        $usuario = new Usuario();
        $errores = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $postData = $_POST['usuario'] ?? [];
            $usuario = new Usuario($postData);

            // Validar campos obligatorios (nombre, email, password y rol)
            $errores = $usuario->validarRegistro();

            // Guardar en la base de datos si no hay errores
            if (empty($errores)) {
                // ⚠️ Texto plano: no hasheamos la contraseña
                // $usuario->password = password_hash($usuario->password, PASSWORD_DEFAULT);

                $exito = $usuario->crear(); // ahora devuelve bool
                if ($exito) {
                    // Redirigir a login después del registro
                    header("Location: /login");
                    exit;
                } else {
                    $errores[] = "No se pudo crear el usuario, intenta nuevamente.";
                }
            }
        }

        $router->render("usuarios/crear", [
            "usuario" => $usuario,
            "errores" => $errores
        ]);
    }

    // Mostrar perfil de usuario
    public static function perfil(Router $router, $id = null): void
    {
        if (!$id) {
            header("Location: /usuarios");
            exit;
        }

        $usuario = Usuario::find($id);
        if (!$usuario) {
            header("Location: /usuarios");
            exit;
        }

        $router->render("usuarios/perfil", [
            "usuario" => $usuario
        ]);
    }
}
