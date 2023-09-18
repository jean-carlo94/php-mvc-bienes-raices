<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController{

    public static function index(Router $router){
        $propiedades = Propiedad::get(3);
        $inicio = true;
        $router->render('paginas/index',[
            'propiedades' => $propiedades,
            'inicio'=>$inicio
        ]);

    }
    public static function nosotros( Router $router){
        $router->render('paginas/nosotros');
    }

    public static function propiedades(Router $router){
        $propiedades = Propiedad::all();
        $router->render('paginas/propiedades',[
            'propiedades'=>$propiedades
        ]);
    }
    public static function propiedad(Router $router){
        
        $id = validarORedireccionar('/propiedades');
        $propiedad = Propiedad::find($id);
        $router->render('paginas/propiedad',[
            'propiedad'=>$propiedad
        ]);
    }

    public static function blog(Router $router){
        $router->render('paginas/blog');
    }
    public static function entrada(Router $router){
        $router->render('paginas/entrada');
    }

    public static function contacto(Router $router){
        $mensaje = null;
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
            //Crear ina instancia de PHP Mailer
            $respuestas = $_POST;
            $mail = new PHPMailer();
            //configurar SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = 'f85002ee297de7';
            $mail->Password = '1741016bd26e24';
            $mail->Port = 2525;

            // Configurar el contendido del mail
            $mail->setFrom('admin@binesraices.com');
            $mail->addAddress('admin@bienesraices.com','BienesRaices.com');
            $mail->Subject = 'Tinenes un nuevo mensaje';

            $contenido = "<html>";
            $contenido .="<p>Nombre {$respuestas['nombre']}</p>";
            $contenido .="<p>Mensaje {$respuestas['mensaje']}</p>";
            $contenido .="<p>Vende o Compra {$respuestas['tipo']}</p>";
            $contenido .="<p>Presupuesto {$respuestas['presupuesto']}</p>";

            $contenido .="<p>Eligio ser contactado por {$respuestas['contacto']}</p>";
            if($respuestas['contacto'] === 'telefono'){
                $contenido .="<p>Telefono {$respuestas['telefono']}</p>";
                $contenido .="<p>Fecha para contactar {$respuestas['fecha']}</p>";
                $contenido .="<p>Hora para Contacto {$respuestas['hora']}</p>";
            }else{
                $contenido .="<p>Email {$respuestas['email']}</p>";
            }         
            $contenido .="</html>";

            $mail->Body = $contenido;
            $mail->AltBody = "Esto es un texto sin HTML";

            if($mail->send()){
                $mensaje = "mensaje enviado";
            }else{
                $mensaje = "El mensaje no se pudo enviar";
            }

        }
        $router->render('paginas/contacto',[
            'mensaje' => $mensaje
        ]);
    }
}