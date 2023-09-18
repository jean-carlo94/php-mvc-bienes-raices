<?php
declare ( strict_types = 1);

namespace Model;

class Vendedor extends ActiveRecord{
    protected static $tabla = 'vendedores';
    protected static $columnasDB = ['id','nombre','apellido','telefono','imagen'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;
    public $imagen;
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
    }

    public function validar(): array {
        if(!$this->nombre){
            self::$errores[] = "Debes añadir un nombre";
        }
        if(!$this->apellido){
            self::$errores[] = "Debes añadir un apellido";
        }
        if(!$this->telefono){
            self::$errores[] = "Debes añadir un telefono";
        }
        if(!$this->imagen){
            self::$errores[] = "Debes añadir un imagen";
        }
        //Explesion Regular
        if(!preg_match('/[0-9]{10}/', $this->telefono)){
            self::$errores[] = "Fotmato Telefono no valido";
        }
        return self::$errores;
    }
}