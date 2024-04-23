<?php
namespace App;
class ActiveRecord{
    //BBDD, creamos un static, ya que por mas que creemos 1000 objetos de la clase, todos usaran la misma conexion, de lo contrario, habria 1000 conexiones abiertas a la BD, entonces almacenamos la referencia a la DB
    protected static $db;
    protected static $columnasDB=[];
    protected static $tabla='';
    //errores
    protected static $errores=[]; 

    //Definimos la conexion  a la DB, tambien debe ser una funcion estatica, no se cambia a static ya que la BD es la misma para las dos clases que heredan del AR (ActiveRecord)
    public static function setDB($db){
        self::$db = $db;
    }
    public function guardar(){
        // if(isset($this->id)){
        if(!is_null($this->id)){
            //actualizando
            
            $this->actualizar();
            
        }else{
            //creando un nuevo registro
            
            $this->crear();
        }
    }
    public function crear(){
        // echo 'guardando...';
        
        //sanitizar los datos
        $atributos=$this->sanitizarAtributos();
        
        //insertar en la BD
        $query = " INSERT INTO ".static::$tabla." (";
        $query.=join(', ', array_keys($atributos));
        $query.=") VALUES ('";
        $query.=join("', '", array_values($atributos));        
        $query.="')";

        $resultado=self::$db->query($query);
        
        if($resultado):
            
            //redireccionamos al usuario
            header('Location: ../index.php?resultado=1');
        endif;
        
    }
    public function actualizar(){
        //sanitizar los datos
        $atributos=$this->sanitizarAtributos();

        $valores=[];
        foreach($atributos as $key=>$value):
            $valores[]= "{$key}='{$value}'";
        endforeach;
        $query='UPDATE '.static::$tabla.' SET ';
        $query.=join(', ',$valores);
        $query.=' WHERE id=';
        $query.=self::$db->escape_string($this->id);
        $query.=' LIMIT 1';
        
        $resultado=self::$db->query($query);
        
        if($resultado):
            //redireccionamos al usuario
            header('Location: ../index.php?resultado=2');
        endif;
        
    }
    //Eliminar un registro
    public function eliminar(){
        $query="DELETE FROM ". static::$tabla ." WHERE id=". self::$db->escape_string($this->id)." LIMIT 1";
        $resultado=self::$db->query($query);

        if($resultado){
            
            $this->borrarImagen();
            header('Location: index.php?resultado=3');
        }

        
    }

    //identificar y unir los atributos de la BD, hacer el espejo 
    public function atributos(){
        $atributos=[];

        foreach(static::$columnasDB as $columna):
            if($columna==='id')continue;
            $atributos[$columna]=$this->$columna;
        endforeach;
        return $atributos;
    }
    public function sanitizarAtributos(){
        $atributos=$this->atributos();
        $sanitizado=[];
        foreach($atributos as $key=>$value):
            $sanitizado[$key]=self::$db->escape_string($value);
        endforeach;
        return $sanitizado;
    }
    //subida de archivos
    public function setImagen($imagen){
        //elimina la imagen previa
        if(!is_null($this->id))$this->borrarImagen();
        //asignar al atributo imagen el nombre de la imagen
        if($imagen){
            $this->imagen=$imagen;
        }
    }
    //eliminar archivo
    public function borrarImagen(){
        
        $existeArchivo=file_exists(CARPETA_IMAGENES.$this->imagen);
        
        //comprobar si existe archivo en servidor
        if($existeArchivo){
            unlink(CARPETA_IMAGENES.$this->imagen);
        }
    }
    //Validacion
    public static function getErrores(){
        return static::$errores;
    }

    public function validar(){
        static ::$errores=[];//limpiamos los errores
        return static::$errores;
    }
    //lista todos los registros
    public static function all(){
        
        $query="SELECT * FROM ".static::$tabla;//static trae de la clase que heredo, y esta en este caso, pisando, redefiniendo el atributo
        
        $resultado=self::consultarSQL($query);
        return $resultado;
    }
    //Buscar un registro por su ID
    public static function find($id){
     
        $query="SELECT * FROM ". static::$tabla ." WHERE id = ${id}";
        
        $resultado=self::consultarSQL($query);
        //nos devuelve un resultado, la primer posicion
        
        return array_shift($resultado);
    }
    //Obtiene determinado numero de registros
    public static function get($cantidad){
        $query="SELECT * FROM ".static::$tabla . " LIMIT " . $cantidad;//static trae de la clase que heredo, y esta en este caso, pisando, redefiniendo el atributo
        
        $resultado=self::consultarSQL($query);
        return $resultado;
    }
    public static function consultarSQL($query){
        //consultar la BD
        $resultado=self::$db->query($query);
        //iterar los resultados
        $array=[];
        while($registro=$resultado->fetch_assoc()){
            //tengo que convertir los datos del arreglo a un objeto para poder hacer el espejo, q requiere el active record
            $array[]=static::crearObjeto($registro);
        }
        //liberar memoria
        $resultado->free();
        //retornar los resultados
        return $array;
    }
    protected static function crearObjeto($registro){
        //crea un objeto de la clase actual
        $objeto=new static;

        foreach($registro as $key=>$value){
            if (property_exists($objeto,$key))$objeto->$key=$value;
        }
        return $objeto;
    }

    //sincronizar el objeto en memoria con los cambios realizados por el usuario
    public function sincronizar($args=[]){
        foreach($args as $key=>$value){
            if(property_exists($this, $key) && !is_null($value)){
                //vamos mapeando
                $this->$key = $value;
            }
        }
    }
}

?>