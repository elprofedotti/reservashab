<?php

$auth=$_SESSION['login'] ?? false;
$directorio=dirname($_SERVER['PHP_SELF']).'/';
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
?>
<footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="<?php echo $directorio ?>nosotros.php">Nosotros</a>
                <a href="<?php echo $directorio ?>anuncios.php">Habitaciones</a>
                <a href="<?php echo $directorio ?>blog.php">Blog</a>
                <a href="<?php echo $directorio ?>contacto.php">Contacto</a>
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
        
        <p class="copyright">
            Todos los derechos reservados <?php echo date('Y') ?> - @elprofedotti &copy;
        </p>
    </footer>
    <script src="<?php echo $directorio ?>build/js/bundle.min.js?v=1.0.0"></script>
</body>
</html>