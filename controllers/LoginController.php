<?php

namespace Controllers;
use MVC\Router;
use Model\Admin;

class LoginController{
    public static function login(Router $router){
        $errores = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $auth = new Admin($_POST);
            $errores = $auth->validar();
            
            if(empty($errores)){
                $resultado = $auth->existeUsuario();

                if(!$resultado){
                    //Vetificar si el usuario existe
                    $errores = Admin::getErrores();
                }else{
                    //Vetificar password
                    $autenticado = $auth->comprobarPassword($resultado);
                    if($autenticado){
                         //Autenticar Usuario
                        $auth->autenticar();
                    }else{
                        $errores = Admin::getErrores();
                    }
                }
            }
        };

        $router->render('auth/login',[
            'errores'=>$errores
        ]);

    }
    public static function logout(){
        if(isset($_SESSION)) 
        {  
            $_SESSION = [];
            session_destroy();
        }

        header('Location: /');
    }
}