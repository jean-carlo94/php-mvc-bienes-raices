<?php
namespace Model;

class ActiveRecord{
    //BASE DE DATOS
    protected static $db;
    protected static $columnasDB = [];
    protected static $tabla = '';
    protected static $errores = [];
     //Definir Conexion a la DB
    public static function setDB($database){
        self::$db = $database;
    }
    public function guardar(){
        if(!is_null($this->id)){
            //Actualziar
            $this->actualizar();
        }else{
            //Crear
            $this->crear();
        }
    }
    public function crear(){
        //Sanitizar los datos
        $atributos = $this->SanitizarAtributos();
        //Insertar Datos
        $query = "INSERT INTO ". static::$tabla ." (";
        $query .=join(',',array_keys($atributos));
        $query .=") VALUES ('";
        $query .=join("', '",array_values($atributos));
        $query .="')";
        
        $resultado = self::$db->query($query);
        if($resultado){
            // Rediraccionar al usuario.
            header('Location: /admin?resultado=1');
        }
    }
    public function actualizar(){
        //Sanitizar los datos
        $atributos = $this->SanitizarAtributos();
        $valores = [];
        foreach($atributos as $key => $value){
            $valores[]="$key='$value'";
        }
        $query = "UPDATE ". static::$tabla ." SET ";
        $query .= join(', ',$valores);
        $query .= " WHERE id = '".self::$db->escape_string($this->id)."'";
        $query .= " LIMIT 1";
        
        $resultado = self::$db->query($query);
        if($resultado){
            // Rediraccionar al usuario.
            header('Location: /admin?resultado=2');
        }
    }
    //Eliminar un reistro
    public function eliminar(){
        //Eliminar la pripiedad
        $query = "DELETE FROM ". static::$tabla ." WHERE id = ".self::$db->escape_string($this->id)." LIMIT 1";
        $resultado = self::$db->query($query);
        if($resultado){
            $this->borrarImagen();
            header('Location: /admin?resultado=3');
        }
    }
    // Identifiacar Y unir los atributos de la BD;
    public function Atributos(): array{
        $atributos = [];
        foreach (static::$columnasDB as $columna) {
            if($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }
    // sinitizar entrada de datos
    public function SanitizarAtributos(): array{
        $atributos = $this->Atributos();
        $sanitizado = [];
        foreach($atributos as $key => $value){
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }
    //Subida de archivos
    public function setImagen($imagen){
        // Eliminar imagen
        if(!is_null($this->id)){
            $this->borrarImagen();
        }
        //Asignar al atributo el nombre de la imagen
        if($imagen){
            $this->imagen = $imagen;
        }
    }
    public function borrarimagen(){
        if($this->imagen){
            $existeArchivo = file_exists(CARPETA_IMAGENES.$this->imagen);
            if($existeArchivo){
                unlink(CARPETA_IMAGENES.$this->imagen);
            }
        }
    }
    //Validacion
    public static function getErrores(): array{
        return static::$errores;
    }
    public function validar(): array{
        static::$errores = [];
        return static::$errores;
    }
    // Listar Todas las ". static::$tabla 
    public static function all(): array{
        $query = "SELECT * FROM ". static::$tabla ;

        $resultado = self::consultarSQL($query);
        return $resultado;
    }
    //Obtiene determinada catidad de registros
    public static function get($cantidad): array{
        $query = "SELECT * FROM ". static::$tabla ." LIMIT ".$cantidad;

        $resultado = self::consultarSQL($query);
        return $resultado;
    }
    //Buscar un registro por id;
    public static function find($id): object{
        $query = "SELECT * FROM ". static::$tabla ." WHERE id = $id";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado); 
    }
    public static function consultarSQL($query): array{
        //Consultar
        $resultado = self::$db->query($query);
        //Interar los resultados
        $array = [];
        while($registro = $resultado->fetch_assoc()){
            $array[] = static::crearObjeto($registro);
        }
        //Liberar la memmoria
        $resultado->free();
        //Retornar los resultados
        return $array;
    }
    protected static function crearObjeto($registro): object{
        $objeto = new static;
        foreach($registro as $key => $value){
            if(property_exists($objeto,$key)){
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }
    //Sincroniza el objeto en memoria con los cambios realizados por el usuario
    public function sincronizar($arg=[]){
        foreach($arg as $key => $value){
            if(property_exists($this,$key) && !is_null($value)){
                $this->$key = $value;
            }
        }
    }
}

