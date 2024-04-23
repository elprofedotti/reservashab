<?php
    
    require 'includes/app.php'; 
    $db=conectarDB();
    
    // autenticar al usuario
    $errores=[];
    if($_SERVER['REQUEST_METHOD'] === 'POST' ?? null){
        $accion = $_POST['accion'];
        
        switch ($accion) {
            case 'login':

                    $email=mysqli_real_escape_string($db,filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
                    $pass=mysqli_real_escape_string($db,$_POST['pass']);
                    
                    // echo '<pre>';
                    //     var_dump($_POST);
                    // echo '</pre>';
                    // exit;
                    
                    if(!$email)$errores[]='El email es obligatorio';
                    if(!$pass)$errores[]='El password es obligatorio';
            
                    if(empty($errores)):
                        
                        //revisar si existe el usuario
                        $query="SELECT * FROM users WHERE email='${email}'";
                        
                        $resultado=mysqli_query($db, $query);
                        
                        if($resultado->num_rows){
                            //revisar pass
                            $usuario=mysqli_fetch_assoc($resultado);
            
                            //verificar pass correcto
                            $auth=password_verify($pass, $usuario['contraseña']);
                            
                                
                            if($auth){
                                //usuario autenticado OK
                                session_start();
            
                                //accedemos a la superglobal $_SESSION
                                $_SESSION['usuario_id'] = $usuario['id'];
                                $_SESSION['usuario']=$usuario['email'];
                                $_SESSION['usuario_tipo'] = $usuario['tipo'];
                                $_SESSION['login']=true;
                                $_SESSION['login_success'] = 'Login correcto';
                                
                                if($_SESSION['usuario_tipo'] == 0) {
                                    // Si es administrador, redirigir al dashboard
                                    header('Location: dashboard.php');
                                } else {
                                    // Si es un usuario regular, redirigir a la página de bienvenida
                                    header('Location: bienvenido.php');
                                }

                            }else{
                                $errores[]="password INCORRECTO";
                                // echo $pass;
                            }
            
            
                        }else{
                            $errores[]='El usuario no existe';
                        }
            
                    endif;
                
                break;        
            case 'registro':

                $nombre = $_POST['nombre'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                
                // Hash de contraseña
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                
                $query="INSERT INTO users (nombre, email, contraseña) VALUES ('${nombre}','${email}' ,'${passwordHash}')";
                $resultado=mysqli_query($db, $query);
                            
                
                if ($resultado) {
                    header('Location: registroOK.php'); 
                } else {
                    echo 'Error en el registro.';
                }
                break;
            }
    }
    incluirTemplates('header');
?>

<main class="contenedor seccion contenido-centrado">
    <h1>Inicio de Sesión</h1>
    <h2>Usuarios</h2>
    <!-- si hay errores mostramos aca -->
    <?php   foreach ($errores as $error):?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach;?>


    <!-- no colocamos el action, y eso hace q los envie al mismo archivos, que es donde validamos -->
    <form method="POST" class="formulario">
        <fieldset>
            <legend>Email y Password</legend>
            <label for="email">Email</label>
            <input type="email" placeholder="Tu Email" id="email" name="email" required>
            <label for="pass">Password</label>
            <input type="password" placeholder="Tu password" id="pass" name="pass" required>
            <input type="hidden" name="accion" value="login">
        </fieldset>
        <input type="submit" value="Iniciar sesion" class="boton-verde">
    </form>
    
    <h2>No estás registrado?</h2>
    <form method="POST" class="formulario">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            
            <input type="hidden" name="accion" value="registro">
            
            <button type="submit" class="boton-amarillo">Registrarse</button>
        </form>
    
</main>
<?php
    incluirTemplates('footer');
?>