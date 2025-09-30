<?php
namespace Model;

class Contacto extends ActivaModelo {
    protected static $tabla = "contactos"; // Nombre de la tabla en la base de datos
    protected static $columnDB = ["nombre", "email", "asunto", "mensaje"];

    public $id;
    public $nombre;
    public $email;
    public $asunto;
    public $mensaje;

    protected static $errores = [];

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->asunto = $args['asunto'] ?? '';
        $this->mensaje = $args['mensaje'] ?? '';
    }

    // Validar campos obligatorios
    public function validar(): array
    {
        $errores = [];
        if (!$this->nombre) $errores[] = "El nombre es obligatorio";
        if (!$this->email) $errores[] = "El email es obligatorio";
        if (!$this->asunto) $errores[] = "El asunto es obligatorio";
        if (!$this->mensaje) $errores[] = "El mensaje es obligatorio";
        return $errores;
    }

    // Guardar contacto en la base de datos
    public function crear(): bool
    {
        $query = "INSERT INTO " . self::$tabla . " (nombre, email, asunto, mensaje) VALUES (";
        $query .= "'" . self::$db->real_escape_string($this->nombre) . "', ";
        $query .= "'" . self::$db->real_escape_string($this->email) . "', ";
        $query .= "'" . self::$db->real_escape_string($this->asunto) . "', ";
        $query .= "'" . self::$db->real_escape_string($this->mensaje) . "')";
        
        $resultado = self::$db->query($query);
        if (!$resultado) {
            self::$errores[] = "Error al guardar el mensaje: " . self::$db->error;
        }
        return (bool) $resultado;
    }

    public static function getErrores(): array
    {
        return static::$errores;
    }
}
