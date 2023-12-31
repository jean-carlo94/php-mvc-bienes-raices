<?php 

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController{
    public static function index(Router $router){
        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();

        $resultado = $_GET['resultado'] ?? null;
        $router->render('propiedades/admin',[
            'propiedades'=>$propiedades,
            'resultado'=>$resultado,
            'vendedores'=>$vendedores
        ]);
    }
    public static function crear(Router $router){
        $propiedad = new Propiedad();
        $vendedores = Vendedor::all();
        $errores = Propiedad::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $propiedad = new Propiedad($_POST);
            if($_FILES['imagen']['tmp_name']){
                //Define la extensión para el archivo
                if ($_FILES['imagen']['type'] === 'image/jpeg') {
                    $ext = '.jpg';
                }else{
                    $ext = '.png';
                };
                // Generar nombre único ** Aquí fue donde encontré el problema
                $nombreImagen = md5(uniqid(rand(),true)).$ext;
                // Realiza un resize a la imagen con Intervention Image
                $imagen = Image::make($_FILES['imagen']['tmp_name'])->fit(800,600);
                $propiedad->setImagen($nombreImagen);
            }
            //Validar
            $errores = $propiedad->validar();
    
            if(empty($errores)){
                //Crear la carpeta para subir imagenes
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }
                //Guardar la imagen
                $imagen->save(CARPETA_IMAGENES.$nombreImagen);
                //Guardar en la base de datos
                $resultado = $propiedad->guardar();
            }
        }

        $router->render('propiedades/crear',[
            'propiedad'=>$propiedad,
            'vendedores'=>$vendedores,
            'errores'=>$errores
        ]);
    }
    public static function actualizar(Router $router){
        $id = validarORedireccionar('admin');
        $propiedad = Propiedad::find($id);
        $vendedores = Vendedor::all();
        $errores = Propiedad::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
            $propiedad->sincronizar($_POST);    
            if($_FILES['imagen']['tmp_name']){
                //Define la extsión para el archivo
                if ($_FILES['imagen']['type'] === 'image/jpeg') {
                    $ext = '.jpg';
                }else{
                    $ext = '.png';
                };
                // Generar nombre único ** Aquí fue donde encontré el problema
                $nombreImagen = md5(uniqid(rand(),true)).$ext;
                // Realiza un resize a la imagen con Intervention Image
                $imagen = Image::make($_FILES['imagen']['tmp_name'])->fit(800,600);
                $propiedad->setImagen($nombreImagen);
                $imagen->save(CARPETA_IMAGENES.$nombreImagen);
            }
            $propiedad->validar();
            if(empty($errores)){
                $resultado = $propiedad->guardar();
            }
        }
        $router->render('/propiedades/actualizar',[
            'propiedad'=>$propiedad,
            'vendedores'=>$vendedores,
            'errores'=>$errores
        ]);
    }
    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $id =  filter_var($id, FILTER_VALIDATE_INT); 
            if($id){
                $tipo = $_POST['tipo'];
                if(validarTipoContenido($tipo)){
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();
                }           
            }
        }
    }
}