<?php

namespace App;

class User extends ActiveRecord{
    protected static $tabla='users';
    protected static $columnasDB=[  'id','nombre','email','constraseña'];
    public $id;
    public $nombre;
    public $email;
    public $contraseña;

    public function __construct($args=[]){
        $this->id=$args['id']??null;
        $this->nombre=$args['nombre']??'';
        $this->email=$args['email']??'';
        $this->contraseña=$args['contraseña']??'';
    }
    public function validar() {
        if(!$this->nombre) {
            self::$errores[] = "El Nombre es Obligatorio";
        }

        if(!$this->email) {
            self::$errores[] = "El Email es Obligatorio";
        }

        if(!$this->contraseña) {
            self::$errores[] = "La Constraseña es Obligatoria";
        }

        return self::$errores;
    }
}




?>