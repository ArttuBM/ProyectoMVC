<?php
namespace Model;

class ActivaModelo {
    protected static $db;
    protected static $tabla;
    protected static $columnDB = [];

    public static function setDB($baseDatos)
    {
        self::$db = $baseDatos;
    }

    protected static function validarDB()
    {
        if (!self::$db) {
            throw new \Exception("Base de datos no inicializada. Ejecuta ActivaModelo::setDB(\$db) primero.");
        }
    }

    public static function listar()
    {
        self::validarDB();
        $query = "SELECT * FROM " . static::$tabla;
        $resultado = self::$db->query($query);
        return $resultado ? $resultado->fetch_all(MYSQLI_ASSOC) : [];
    }

    public static function find($id)
    {
        self::validarDB();
        $id = self::$db->real_escape_string($id);
        $query = "SELECT * FROM " . static::$tabla . " WHERE id = '$id' LIMIT 1";
        $resultado = self::$db->query($query);
        return $resultado && $resultado->num_rows ? $resultado->fetch_object() : null;
    }

    public function crear()
    {
        self::validarDB();
        $atributos = $this->pasar();
        $columnas = join(",", array_keys($atributos));
        $valores = join("','", array_values($atributos));
        $query = "INSERT INTO " . static::$tabla . " ($columnas) VALUES ('$valores')";
        return self::$db->query($query);
    }

    public function pasar()
    {
        $atributos = [];
        foreach(static::$columnDB as $columna) {
            if (property_exists($this, $columna)) {
                $atributos[$columna] = self::$db->real_escape_string($this->$columna ?? '');
            }
        }
        return $atributos;
    }
}
