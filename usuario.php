<?php
    //importar la conexion
    //require 'includes/config/database.php';
    require 'includes/app.php';
    $db=conectarDB();


    //crear un email y pass
    $email='correo@correo.com';
    $pass="1234";
    //la siguiente funcino, genera un hash de SIEMPRE 60 caracteres, por eso definimos com ochar(60) la columna pass en usuarios...
    $passHash=password_hash($pass,PASSWORD_DEFAULT);

    //var_dump($passHash);

    //query para crear el usuario
    $query="INSERT INTO usuarios (email, pass) VALUES ('${email}', '${passHash}')";

    
    //agregarlo a la BBDD
    mysqli_query($db,$query);

    header('Location: index.php');


?>