<?php
    
    require '../../includes/app.php';
    estaAutenticado();
    use App\Propiedad;
    use App\Vendedor;
    use Intervention\Image\ImageManagerStatic as Image;

    
    
    
    // Validar la URL por ID válido
    // $id = $_GET['id'];
    // $id = filter_var($id, FILTER_VALIDATE_INT);
    $id=filter_var($_GET['id'], FILTER_VALIDATE_INT);
    
    //cheuqeo que haya un id, si no hay redirijo a admin/ o ../ que en este caso seria subir un nivel, lo que daria ir al admin.
    if(!$id) header('location: ../index.php');
    
    $propiedad=Propiedad::find($id);
    $vendedores=Vendedor::all();
    
    
    
    //Arreglo con mensajes de errores
    $errores=Propiedad::getErrores();
    
    //Ejecutar el codigo despues de que el usuario envia el formulario
    if($_SERVER['REQUEST_METHOD']==='POST'){
        //asignar los atributos
        $args=$_POST['propiedad'];
        $propiedad->sincronizar($args);
        //Validacion
        $errores=$propiedad->validar();
        //subida archivo
        //generar nombre unico para la imagen a guardar
        $nombreImagen= md5( uniqid( rand(), true ) ) . '.jpg';
        //setear la imagen
        //realiza un resize a la imagen con intervention
        if($_FILES['propiedad']['tmp_name']['imagen']){
            // debuguear($_FILES);
            
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
            
            $propiedad->setImagen($nombreImagen);
            
        }
        //revisar q array errores este vacio
        if(empty($errores)){
            if($_FILES['propiedad']['tmp_name']['imagen']){
                
                $image->save(CARPETA_IMAGENES.$nombreImagen);
            }
            
            $propiedad->guardar();
        }
        
    }
    incluirTemplates('header');
    
?>
<main class="contenedor seccion">
    <h1>Actualizar Propiedad</h1>
    <a href="../index.php" class="boton boton-verde-inline">Volver</a>
    <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php   echo $error; ?>
        </div>
    <?php endforeach; ?>
    <!-- En el FORMULARIO podemos sacar el action, y de esa forma redirecciona a la misma pagina, manteniendo la url y no va a dar entonces error en la validacion inicial  -->
    <form  class="formulario" method="POST" enctype="multipart/form-data">
        <?php include '../../includes/templates/formulario_propiedades.php';?>
        <input type="submit" value="Actualizar datos" class="boton boton-verde">
    </form>
</main>
<?php
    incluirTemplates('footer');
?>
