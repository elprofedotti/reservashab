<?php


function conectarDB() : mysqli{
    
    $db=new mysqli('89.116.115.122', 'u414612939_breprofe', 'H3lito$2024','u414612939_bienesraices_');

    if(!$db){
        echo "ERROR no se conecto";
        exit;

    }
    return $db;
}
