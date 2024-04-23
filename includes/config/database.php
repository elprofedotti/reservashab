<?php


function conectarDB() : mysqli{
    
    $db=new mysqli('localhost', 'root', 'Helito&2018','bienesraices_crud');

    if(!$db){
        echo "ERROR no se conecto";
        exit;

    }
    return $db;
}
