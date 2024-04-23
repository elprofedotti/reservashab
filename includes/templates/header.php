<?php
    if(!isset($_SESSION)){
        session_start();
    }
    //si no existe login, es q no esta autenticado, asiq en ese caso va un NULL
    $auth=$_SESSION['login'] ?? false;

    // Obtén el nombre del archivo actual
    $paginaActual = basename($_SERVER['PHP_SELF']);
        
    $directorio=dirname($_SERVER['PHP_SELF']).'/';
    // echo '<hr>'.$directorio;
    
    // echo '<hr>'.dirname($directorio);
    
    // echo '<hr>'.dirname(dirname($directorio));
    if($directorio===dirname($directorio).'/admin/' || dirname($directorio)===dirname(dirname($directorio)).'/admin'){
        if(dirname($directorio)===dirname(dirname($directorio)).'/admin'){
            $directorio=dirname(dirname($directorio)).'/';
            // echo 'toy aca';
        }
        else{
            $directorio=dirname($directorio).'/';
            // echo 'toy alla';
        }
        
    }
    // echo '<hr>';
    // echo $directorio;
    // exit;
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas de Habitaciones</title>
    <link rel='stylesheet' href="<?php echo $directorio?>build/css/app.css?v=1.9.0">
    

        
</head>
<body>
    <header class="header <?php echo $inicio ? 'inicio' : '';?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <?php if (isset($_SESSION['login']) && $_SESSION['usuario_tipo'] == 0): ?>
                    <a href="<?php echo $directorio?>dashboard.php">
                    
                <?php else: ?>
                    <a href="<?php echo $directorio?>index.php">
                <?php endif; ?>
                <img src="<?php echo $directorio ?>build/img/logo.png" alt='Logotipo de Reservas de Habitacion'>
                </a>
                <div class="mobile-menu">
                    <img src="<?php echo $directorio?>build/img/barras.svg" alt='menu responsive'>
                </div>            
                
                <div class="derecha">
                    
                    <img src="<?php echo $directorio ?>build/img/dark-mode.svg" class="dark-mode-boton">
                    <nav class="navegacion">
                        
                        <?php if (isset($_SESSION['login']) && $_SESSION['usuario_tipo'] == 0): ?>
                            <a href="dashboard.php">Dashboard</a>
                        <?php else: ?>
                            <a href="<?php echo $directorio ?>nosotros.php">Nosotros</a>
                            <a href="<?php echo $directorio ?>anuncios.php">Habitaciones</a>
                            <a href="<?php echo $directorio ?>blog.php">Blog</a>
                            <a href="<?php echo $directorio ?>contacto.php">Contacto</a>
                        <?php endif; ?>
                        
                        <?php  
                            
                            if ($auth){
                                echo "<a href=". $directorio."/cerrar-sesion.php>Cerrar sesion</a>";
                                // echo '<a href="admin">Admin</a>';
                                // echo (dirname($_SERVER['PHP_SELF'])=== $directorio.'admin')?'':"<a href=".$directorio."admin>Admin</a>";
                                
                                
                                
                            }
                            else{
                                
                                // Si estoy en la página, agrega el ítem adicional al menú usando el operador ternario
                                // echo ($paginaActual === 'contacto.php') ? '<a href="login.php">Entrar</a>' : '';
                                echo "<a href=". $directorio ."loginUsuarios.php>Login</a>";
                            }
                            
                        ?>
                    </nav>
                </div>
            </div>  <!-- .barra  -->
            
            <?php echo $inicio ? "<h1>Reserva de habitaciones de LUJO</h1>":'';?>
            
        </div>
    </header>