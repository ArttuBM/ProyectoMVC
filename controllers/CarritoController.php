<?php
namespace Controllers;

use MVC\Router;
use Model\Curso;

class CarritoController {
    public static function index(Router $router) {
        // Iniciar sesión si no está
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $carrito = $_SESSION['carrito'] ?? [];
        $cursos = [];

        // Obtener datos de los cursos en el carrito
        foreach ($carrito as $id) {
            $curso = Curso::find($id);
            if ($curso) {
                $cursos[] = $curso;
            }
        }

        $router->render('carrito/index', [
            'cursos' => $cursos
        ]);
    }

    public static function agregar() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $id = $_POST['id'] ?? null;
        if (!$id) {
            if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
                echo json_encode(['success' => false, 'message' => 'ID de curso requerido']);
                exit;
            }
            header('Location: /cursos');
            exit;
        }

        // Verificar si el curso existe
        $curso = \Model\Curso::find($id);
        if (!$curso) {
            if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
                echo json_encode(['success' => false, 'message' => 'Curso no encontrado']);
                exit;
            }
            header('Location: /cursos');
            exit;
        }

        // Inicializar carrito si no existe
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }

        // Verificar si ya está en el carrito
        if (in_array($id, $_SESSION['carrito'])) {
            if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
                echo json_encode(['success' => false, 'message' => 'El curso ya está en el carrito']);
                exit;
            }
            header('Location: /carrito');
            exit;
        }

        // Agregar al carrito
        $_SESSION['carrito'][] = $id;

        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
            echo json_encode(['success' => true, 'message' => 'Curso agregado al carrito', 'count' => count($_SESSION['carrito'])]);
            exit;
        }

        // Redirigir si no es AJAX
        header('Location: /carrito');
        exit;
    }

    public static function dropdown(Router $router) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $carrito = $_SESSION['carrito'] ?? [];
        $cursos = [];

        foreach ($carrito as $id) {
            $curso = \Model\Curso::find($id);
            if ($curso) {
                $cursos[] = $curso;
            }
        }

        // Renderizar todo el contenido del dropdown
        ob_start(); ?>
        <h3 class="font-bold mb-2">Carrito de Compras</h3>
        <div id="carrito-items">
            <?php if (empty($cursos)): ?>
                <p>El carrito está vacío.</p>
            <?php else: 
                foreach ($cursos as $curso): ?>
                    <div class="flex justify-between items-center mb-2">
                        <span><?php echo htmlspecialchars($curso->titulo); ?> - $<?php echo htmlspecialchars($curso->precio); ?></span>
                        <button type="button" class="eliminar-carrito text-red-500 hover:text-red-700" data-id="<?php echo $curso->id; ?>">Eliminar</button>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <?php if (!empty($cursos)): ?>
            <a href="/checkout" class="block mt-4 bg-blue-500 text-white text-center py-2 rounded hover:bg-blue-600">Ir a Checkout</a>
        <?php endif;
        $html = ob_get_clean();
        echo $html;
    }

    public static function eliminar() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $id = $_POST['id'] ?? null;
        if (!$id || !isset($_SESSION['carrito'])) {
            if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
                echo json_encode(['success' => false, 'message' => 'ID inválido']);
                exit;
            }
            header('Location: /carrito');
            exit;
        }

        // Remover del carrito
        $_SESSION['carrito'] = array_filter($_SESSION['carrito'], function($cursoId) use ($id) {
            return $cursoId != $id;
        });

        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
            echo json_encode(['success' => true, 'count' => count($_SESSION['carrito'])]);
            exit;
        }

        header('Location: /carrito');
        exit;
    }
}
