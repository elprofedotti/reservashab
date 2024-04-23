<?php
    

    //conectar a la BD
    //require 'includes/config/database.php';
    // echo 'toy aca';
    // exit;
    require 'includes/app.php'; 
    $db=conectarDB();
    
    // autenticar al usuario
    $errores=[];
    if($_SERVER['REQUEST_METHOD'] === 'POST' ?? null){

        $email=mysqli_real_escape_string($db,filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
        $pass=mysqli_real_escape_string($db,$_POST['pass']);
        
        // echo '<pre>';
        //     var_dump($_POST);
        // echo '</pre>';
        // exit;
        
        if(!$email)$errores[]='El email es obligatorio';
        //if(!$pass)$errores[]='El password es obligatorio';

        if(empty($errores)):
            
            //revisar si existe el usuario
            $query="SELECT * FROM usuarios WHERE email='${email}'";
            
            $resultado=mysqli_query($db, $query);
            
            if($resultado->num_rows){
                //revisar pass
                $usuario=mysqli_fetch_assoc($resultado);

                //verificar pass correcto
                $auth=password_verify($pass, $usuario['pass']);
                    //usuario autenticado OK
                    session_start();

                    //accedemos a la superglobal $_SESSION
                    $_SESSION['usuario']=$usuario['email'];
                    $_SESSION['login']=true;

                    header('Location: admin');
                
                // if($auth){
                //     //usuario autenticado OK
                //     session_start();

                //     //accedemos a la superglobal $_SESSION
                //     $_SESSION['usuario']=$usuario['email'];
                //     $_SESSION['login']=true;

                //     header('Location: admin');
                               
                // }else{
                //     $errores[]="password INCORRECTO";
                // }


            }else{
                $errores[]='El usuario no existe';
            }

        endif;

    }
    
    
    //incluye el header
    //require 'includes/funciones.php';    
       
    incluirTemplates('header');
?>
<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesion</h1>
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
        </fieldset>
        <input type="submit" value="Iniciar sesion" class="boton-verde">
    </form>
</main>
<?php
    incluirTemplates('footer');
?>