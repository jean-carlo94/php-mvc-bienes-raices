<?php

namespace Model;

class Admin extends ActiveRecord{
    //Base de datos

    protected static $tabla = 'usuarios';
    protected static $comlumnasDB = ['id','email','password'];

    public $id;
    public $email;
    public $password;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
    }
    public function validar(): array{
        if(!$this->email){
            self::$errores[] = 'El Mail es obligatorio';
        }
        if(!$this->password){
            self::$errores[] = 'El password es obligatorio';
        }
        return self::$errores;
    }
    public function existeUsuario(){
        //Revisar si un usuario Existe;
        $query = "SELECT * FROM ".self::$tabla." WHERE email = '".$this->email."' LIMIT 1";
        $resultado = self::$db->query($query);
        if(!$resultado->num_rows){
            self::$errores[] = 'El usuario no existe';
            return;
        };
        return $resultado;
    }
    public function comprobarPassword($resultado){
        $usuario = $resultado->fetch_object();
        $autenticado = password_verify($this->password,$usuario->password);

        if(!$autenticado){
            self::$errores[] = 'El Password es incorrecto';
        }
        return $autenticado;
    }
    public function autenticar(){
        if(!isset($_SESSION)) 
        { 
            session_start();
        }

        $_SESSION['usuario'] = $this->email;
        $_SESSION['login'] = true; 

        header('Location: /admin');
    }
}