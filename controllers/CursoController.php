<?php
namespace Controllers;

use MVC\Router;
use Model\Curso;

class CursoController {

    // Listar todos los cursos
    public static function index(Router $router): void
    {
        $cursos = Curso::listar(); // Obtiene todos los cursos
        $router->render("cursos/index", [
            "cursos" => $cursos
        ]);
    }

    // Crear un nuevo curso
    public static function crear(Router $router): void
    {
        // Verificar si el usuario está autenticado y es instructor
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (empty($_SESSION['login']) || $_SESSION['usuario_rol'] !== 'instructor') {
            header("Location: /cursos");
            exit;
        }

        $curso = new Curso();
        $errores = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $curso = new Curso($_POST["curso"] ?? []);
            $curso->usuario_id = $_SESSION['usuario_id']; // Setear el usuario autenticado
            
            // Validar campos obligatorios
            $errores = $curso->validar();

            // Manejo de imagen (si existe)
            if (!empty($_FILES["curso"]["name"]["imagen"])) {
                $nombre_imagen = uniqid("curso_") . "_" . basename($_FILES["curso"]["name"]["imagen"]);
                $ubicacion = __DIR__ . "/../public/img/" . $nombre_imagen;

                // Crear carpeta si no existe
                if (!is_dir(__DIR__ . "/../public/img/")) {
                    mkdir(__DIR__ . "/../public/img/", 0755, true);
                }

                if (move_uploaded_file($_FILES["curso"]["tmp_name"]["imagen"], $ubicacion)) {
                    $curso->setImagen($nombre_imagen);
                } else {
                    $errores[] = "❌ Error al subir la imagen.";
                }
            }

            // Guardar en la base de datos si no hay errores
            if (empty($errores)) {
                $resultado = $curso->crear();
                if ($resultado) {
                    header("Location: /cursos");
                    exit;
                } else {
                    $errores[] = "⚠️ No se pudo crear el curso, intenta nuevamente.";
                }
            }
        }

        $router->render("cursos/crear", [
            "curso" => $curso,
            "errores" => $errores
        ]);
    }
}
