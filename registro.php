<?php
require 'includes/app.php'; 
$db=conectarDB();

// Recoger datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = $_POST['password'];

// Hash de contraseña
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

// Insertar en la base de datos

$query="INSERT INTO users (nombre, email, contraseña) VALUES ('${nombre}','${email}' ,'${passwordHash}')";

$resultado=mysqli_query($db, $query);
            

incluirTemplates('header');
if ($resultado) {
    
    echo 'Registro exitoso. <a href="loginUsuarios.php">Iniciar Sesión</a>';
} else {
    echo 'Error en el registro.';
}
?>