<?php
namespace Controllers;
use MVC\Router;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class VendedorController {
    public static function crear(Router $router){
        $vendedor = new Vendedor();
        $errores = Vendedor::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $vendedor = new Vendedor($_POST);

            if($_FILES['imagen']['tmp_name']){
                //Define la extensión para el archivo
                if ($_FILES['imagen']['type'] === 'image/jpeg') {
                    $exten = '.jpg';
                }else{
                    $exten = '.png';
                };
                // Generar nombre único ** Aquí fue donde encontré el problema
                $nombreImagen = md5(uniqid(rand(),true)).$exten;
                // Realiza un resize a la imagen con Intervention Image
                $imagen = Image::make($_FILES['imagen']['tmp_name'])->fit(800,600);
                $vendedor->setImagen($nombreImagen);
            }
            //Validar
            $errores = $vendedor->validar();
    
            if(empty($errores)){
                //Crear la carpeta para subir imagenes
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }
                //Guardar la imagen
                $imagen->save(CARPETA_IMAGENES.$nombreImagen);
                //Guardar en la base de datos
                $resultado = $vendedor->guardar();
            }
        }

        $router->render('vendedores/crear',[
            'vendedor'=>$vendedor,
            'errores'=>$errores
        ]);
    }
    public static function actualizar(Router $router){
        $errores = Vendedor::getErrores();
        $id = validarORedireccionar('/admin');
        $vendedor = Vendedor::find($id);

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
            $vendedor->sincronizar($_POST);
            if($_FILES['imagen']['tmp_name']){
                //Define la extensión para el archivo
                if ($_FILES['imagen']['type'] === 'image/jpeg') {
                    $exten = '.jpg';
                }else{
                    $exten = '.png';
                };
                // Generar nombre único ** Aquí fue donde encontré el problema
                $nombreImagen = md5(uniqid(rand(),true)).$exten;
                // Realiza un resize a la imagen con Intervention Image
                $imagen = Image::make($_FILES['imagen']['tmp_name'])->fit(800,600);
                $vendedor->setImagen($nombreImagen);
                $imagen->save(CARPETA_IMAGENES.$nombreImagen);
            }
            
            $vendedor->validar();
            if(empty($errores)){
                $resultado = $vendedor->guardar();
            }
        }
        $router->render('vendedores/actualizar',[
            'vendedor'=>$vendedor,
            'errores'=>$errores
        ]);
    }
    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $id = filter_var($id,FILTER_VALIDATE_INT);

            if($id){
                $tipo = $_POST['tipo'];
                if(validarTipoContenido($tipo)){
                    $vendedor = Vendedor::find($id);
                    $vendedor->eliminar();
                }
            }
        }
    }
}