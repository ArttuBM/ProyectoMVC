<?php
namespace Model;

class Curso extends ActivaModelo {
    protected static $tabla = "cursos";
    protected static $columnDB = ["titulo", "descripcion", "precio", "duracion", "imagen", "usuario_id"];

    public $titulo;
    public $descripcion;
    public $precio;
    public $duracion;
    public $imagen;
    public $usuario_id;

    public function __construct($args = [])
    {
        $this->titulo = $args['titulo'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->precio = $args['precio'] ?? 0;
        $this->duracion = $args['duracion'] ?? 0;
        $this->imagen = $args['imagen'] ?? null;
        $this->usuario_id = $args['usuario_id'] ?? null;
    }

    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    public function validar()
    {
        $errores = [];
        if (!$this->titulo) $errores[] = "El título es obligatorio";
        if (!$this->descripcion) $errores[] = "La descripción es obligatoria";
        if ($this->precio <= 0) $errores[] = "El precio debe ser mayor a 0";
        if ($this->duracion <= 0) $errores[] = "La duración debe ser mayor a 0";
        return $errores;
    }
}
