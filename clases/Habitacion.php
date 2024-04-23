<?php

namespace App;

class Habitacion extends ActiveRecord{
    protected static $tabla='habitaciones';
    protected static $columnasDB=[  'id',
                                    'titulo',
                                    'tipo',
                                    'precio',
                                    'descripcion',
                                    'imagen',
                                    'disponibilidad'];
    public $id;
    public $titulo;
    public $tipo;
    public $precio;
    public $descripcion;
    public $imagen;
    public $disponibilidad;
    

    public function __construct($args=[]){
        $this->id=$args['id']??null;
        $this->titulo=$args['titulo']??'';
        $this->tipo=$args['tipo']??'';
        $this->precio=$args['precio']??'';
        $this->descripcion=$args['descripcion']??'';
        $this->imagen=$args['imagen']??'';
        $this->disponibilidad=$args['disponibilidad']??'';
        
    }
    public function validar() {
        if(!$this->titulo){
            self::$errores[]='Debes añadir un titulo';
        }
        if(!$this->tipo){
            self::$errores[]='Debes añadir un tipo';
        }
        if(!$this->precio){
            self::$errores[]='Debes añadir un precio';
        }
        if(strlen($this->descripcion)<50){
            self::$errores[]='La descripcion es obligatoria y debe tener al menos 50 caracteres';
        }
        if(!$this->imagen){
            self::$errores[]='La imagen es obligatoria';
        }
        if(!$this->disponibilidad){
            self::$errores[]='La disponibilidad es obligatoria';
        }
        return self::$errores;
    }
    
}




?>