<?php
/* if(!isset($_SESSION)){
    session_start();
}
dirname($_SERVER['PHP_SELF']) */
define('TEMPLATES_URL' , __DIR__ . '/templates');    
define('FUNCIONES_URL' , __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', __DIR__ . '/../imagenes/');
function incluirTemplates(string $nombre, bool $inicio=false){
    include TEMPLATES_URL . '/' . $nombre . '.php';
}

function estaAutenticado() {
    //activo los datos de sesion
    session_start();
    
    // $auth=$_SESSION['login'];

    // //chequeo si no esta logueado
    // if($auth)return true;
    // return false;

    if(!$_SESSION['login']){
        header('Location: ../index.php');
    }
    
}

function debuguear($variable){
    echo '<pre>';
    echo var_dump($variable);
    echo '</pre>';
    exit;
}

//escapar/sanitizar el HTML
function s($html):string{
    $s=htmlspecialchars($html);
    return $s;
}

//validar tipo de contenido
function validarTipoContenido($tipo){
    $tipos=['vendedor', 'propiedad'];
    return in_array($tipo,$tipos);
}
// Muestra los mensajes
function mostrarNotificacion($codigo) {
    $mensaje = '';

    switch ($codigo) {
        case 1:
            $mensaje = 'Exito al crear';
            break;
        case 2:
            $mensaje = 'Exito al actualizar';
            break;
        case 3:
            $mensaje = 'Exito al eliminar';
            break;
        /* case 4:
            $mensaje = 'Vendedor Registrado Correctamente';
            break;
        case 5:
            $mensaje = 'Vendedor Actualizado Correctamente';
            break;
        case 6:
            $mensaje = 'Vendedor Eliminado Correctamente';
            break; */
        default:
            $mensaje = false;
            break;
    }
    return $mensaje;
}