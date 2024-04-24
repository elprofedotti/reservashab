<?php


function conectarDB() : mysqli{
    
    $db=new mysqli('localhost', 'root', 'pass','bd_crud');

    if(!$db){
        echo "ERROR no se conecto";
        exit;

    }
    return $db;
}
