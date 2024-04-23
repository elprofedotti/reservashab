<?php

namespace App;

class Reserva extends ActiveRecord{
    protected static $tabla='reservas';
    protected static $columnasDB=[  'id',
                                    'id_cliente',
                                    'id_habitacion',
                                    'fecha_inicio',
                                    'fecha_fin',
                                    'estado'];
    public $id;
    public $id_cliente;
    public $id_habitacion;
    public $fecha_inicio;
    public $fecha_fin;
    public $estado;
    
    

    public function __construct($args=[]){
        $this->id=$args['id']??null;
        $this->id_cliente=$args['id_cliente']??'';
        $this->id_habitacion=$args['id_habitacion']??'';
        $this->fecha_inicio=$args['fecha_inicio']??'';
        $this->fecha_fin=$args['fecha_fin']??'';
        $this->estado=$args['estado']??'';
        
    }
    public function validar() {
        if(!$this->fecha_inicio){
            self::$errores[]='Fecha inicial es obligatoria';
        }
        if(!$this->fecha_fin){
            self::$errores[]='Fecha final es obligatoria';
        }
        if(!$this->estado){
            self::$errores[]='El estado es obligatorio';
        }
        return self::$errores;
    }
    
}




?>