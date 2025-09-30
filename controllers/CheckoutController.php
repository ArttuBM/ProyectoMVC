<?php
namespace Controllers;

use MVC\Router;
use Model\Usuario;

class CheckoutController {
    public static function index(Router $router) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $carrito = $_SESSION['carrito'] ?? [];
        if (empty($carrito)) {
            header('Location: /carrito');
            exit;
        }

        $cursos = [];
        $total = 0;
        foreach ($carrito as $id) {
            $curso = \Model\Curso::find($id);
            if ($curso) {
                $cursos[] = $curso;
                $total += $curso->precio;
            }
        }

        // Precargar datos si autenticado
        $usuario = null;
        if (!empty($_SESSION['login']) && !empty($_SESSION['usuario_id'])) {
            $usuario = Usuario::find($_SESSION['usuario_id']);
        }

        $router->render('checkout/index', [
            'cursos' => $cursos,
            'total' => $total,
            'usuario' => $usuario
        ]);
    }

    public static function procesar() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $carrito = $_SESSION['carrito'] ?? [];
        if (empty($carrito)) {
            header('Location: /carrito');
            exit;
        }

        $nombre = $_POST['nombre'] ?? '';
        $email = $_POST['email'] ?? '';

        if (!$nombre || !$email) {
            // Manejar error, pero por simplicidad, redirigir
            header('Location: /checkout');
            exit;
        }

        // Calcular total y preparar mensaje
        $cursos = [];
        $total = 0;
        $instructor_telefono = null;
        foreach ($carrito as $id) {
            $curso = \Model\Curso::find($id);
            if ($curso) {
                $cursos[] = $curso;
                $total += $curso->precio;
                // Obtener teléfono del instructor (del primer curso)
                if (!$instructor_telefono) {
                    $instructor = \Model\Usuario::find($curso->usuario_id);
                    if ($instructor && $instructor->telefono) {
                        $instructor_telefono = $instructor->telefono;
                    }
                }
            }
        }

        $mensaje = "¡Gracias por tu compra, $nombre!\n\n";
        $mensaje .= "Detalles de la compra:\n";
        foreach ($cursos as $curso) {
            $mensaje .= "{$curso->titulo}: \${$curso->precio}\n";
        }
        $mensaje .= "\nTotal: \${$total}\n";
        $mensaje .= "Email: $email\n\n";
        $mensaje .= "¡Esperamos que disfrutes tus cursos!";

        // Limpiar carrito
        unset($_SESSION['carrito']);

        $numero = $instructor_telefono ?: '59170223152';
        $url = "https://wa.me/$numero?text=" . urlencode($mensaje);

        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
            echo json_encode(['success' => true, 'whatsapp_url' => $url]);
            exit;
        }

        header("Location: $url");
        exit;
    }
}