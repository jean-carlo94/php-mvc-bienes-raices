<?php
define('CACHE_TOP',__DIR__.'/cache/top-cache.php');
define('CACHE_BOTTOM',__DIR__.'/cache/bottom-cache.php');
define('TEMPLATES_URL',__DIR__.'/templates');
define('FUNCIONES_URL',__DIR__.'funciones.php');
define('CARPETA_IMAGENES',$_SERVER['DOCUMENT_ROOT'].'/imagenes/');

function incluirTemplates(string $nombre, bool $inicio = false ){
    include TEMPLATES_URL."/${nombre}.php";
}

function estaAutenticado(){
    session_start();
    if(!$_SESSION['login']){
        header('Location: /JeanPruebas/bienesraices_inicio/login.php');
    }
}
// Escapa / sanitizar el HTML;
function s ($html){
    $s = htmlspecialchars($html);
    return $s;
}
// Debugear
function debug($variable){
    echo "<pre>";
        var_dump($variable);
    echo "</pre>";
    exit;
}
//Validar tipo de contenido

function validarTipoContenido($tipo){
    $tipos = ['vendedor','propiedad'];
    return in_array($tipo,$tipos);
}

function mostarNotificacion($codigo){
    $mensaje="";

    switch ($codigo) {
        case 1:
            $mensaje = 'Creando Correctamente';
            break;
        case 2:
            $mensaje = 'Actualizado Correctamente';
            break;
        case 3:
            $mensaje = 'Eliminado Correctamente';
            break;      
        default:
            $mensaje = false;
            break;
    }
    return $mensaje;
}

function limitar_cadena($cadena, $limite, $sufijo){
	if(strlen($cadena) > $limite){
		return substr($cadena, 0, $limite) . $sufijo;
	}
	return $cadena;
}

function validarORedireccionar(string $url){
    //Validar que sea un ID valido
    $id = $_GET['id'];
    $id = filter_var($id,FILTER_VALIDATE_INT);

    if(!$id){
        header("Location: /$url");
    }
    return $id;
}