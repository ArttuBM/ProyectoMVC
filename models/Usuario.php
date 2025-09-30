<?php
namespace Model;

class Usuario extends ActivaModelo {
    protected static $tabla = "usuarios";
    protected static $columnDB = ["nombre", "email", "password", "telefono", "rol"];

    public $id;
    public $nombre;
    public $email;
    public $password;
    public $telefono;
    public $rol;
    public $autenticado = false;
    protected static $errores = [];

    public function __construct($args = [])
    {
        $this->id = $args["id"] ?? null;
        $this->nombre = $args["nombre"] ?? '';
        $this->email = $args["email"] ?? '';
        $this->password = $args["password"] ?? '';
        $this->telefono = $args["telefono"] ?? '';
        $this->rol = $args["rol"] ?? 'estudiante';
    }

    // Validar registro
    public function validarRegistro(): array
    {
        $errores = [];
        if (!$this->nombre) $errores[] = "El nombre es obligatorio";
        if (!$this->email) $errores[] = "El email es obligatorio";
        if (!$this->password) $errores[] = "La contraseña es obligatoria";
        if (!$this->telefono) $errores[] = "El teléfono es obligatorio";
        if (strlen($this->telefono) < 8) $errores[] = "El teléfono debe tener al menos 8 dígitos";

        if (!$this->rol || !in_array($this->rol, ['estudiante','instructor'])) {
            $errores[] = "El rol es obligatorio y debe ser estudiante o instructor";
        }

        if ($this->email && $this->emailExiste()) {
            $errores[] = "El email ya está registrado";
        }

        return $errores;
    }

    // Validar login
    public function validarLogin(): array
    {
        $errores = [];
        if (!$this->email) $errores[] = "El email es obligatorio";
        if (!$this->password) $errores[] = "La contraseña es obligatoria";
        return $errores;
    }

    // Comprobar si el email ya existe (registro)
    private function emailExiste(): bool
    {
        $query = "SELECT id FROM " . self::$tabla . " WHERE email = '" . self::$db->real_escape_string($this->email) . "' LIMIT 1";
        $resultado = self::$db->query($query);
        return $resultado && $resultado->num_rows > 0;
    }

    // Verificar existencia de usuario (login)
    public function existeUsuario(): false|\mysqli_result
    {
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . self::$db->real_escape_string($this->email) . "' LIMIT 1";
        $resultado = self::$db->query($query);

        if (!$resultado || $resultado->num_rows === 0) {
            self::$errores[] = "Usuario no encontrado";
            return false;
        }

        return $resultado;
    }

    // Comprobar contraseña (texto plano)
    public function comprobarPassword($resultado): bool
    {
        if (!$resultado) {
            self::$errores[] = "No se pudo comprobar la contraseña porque el usuario no existe";
            return false;
        }

        $usuario = $resultado->fetch_object();
        if (!$usuario || !isset($usuario->password)) {
            self::$errores[] = "Error al obtener la información del usuario";
            return false;
        }

        // Comparación directa de texto plano
        if (trim($this->password) === $usuario->password) {
            $this->autenticado = true;
            $this->id = $usuario->id;
            $this->nombre = $usuario->nombre;
            $this->rol = $usuario->rol;
        } else {
            $this->autenticado = false;
            self::$errores[] = "Contraseña incorrecta";
        }

        return $this->autenticado;
    }

    // Guardar usuario en DB (texto plano)
    public function crear(): bool
    {
        $query = "INSERT INTO " . self::$tabla . " (nombre, email, password, telefono, rol) VALUES (
            '" . self::$db->real_escape_string($this->nombre) . "',
            '" . self::$db->real_escape_string($this->email) . "',
            '" . self::$db->real_escape_string($this->password) . "',
            '" . self::$db->real_escape_string($this->telefono) . "',
            '" . self::$db->real_escape_string($this->rol) . "'
        )";
        $resultado = self::$db->query($query);

        if (!$resultado) {
            self::$errores[] = "Error al crear el usuario: " . self::$db->error;
        }

        return (bool)$resultado;
    }

    // Autenticar y guardar sesión
    public function autenticar(): void
    {
        if(session_status() !== PHP_SESSION_ACTIVE) session_start();
        $_SESSION["usuario"] = $this->nombre;
        $_SESSION["usuario_id"] = $this->id;
        $_SESSION["usuario_rol"] = $this->rol;
        $_SESSION["login"] = true;
        header("Location: /cursos");
        exit;
    }

    public static function getErrores(): array
    {
        return static::$errores;
    }
}
