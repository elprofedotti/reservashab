<?php
    require '../../includes/app.php';

    use App\Propiedad;
    use App\Vendedor;
    use Intervention\Image\ImageManagerStatic as Image;

    $propiedad=new Propiedad;
    estaAutenticado();
    
    //consultar para obtener los vendedores
    
    $vendedores=Vendedor::all();

    //Arreglo con mensajes de errores
    $errores=Propiedad::getErrores();
    
    

    //Ejecutar el codigo despues de que el usuario envia el formulario
    
    if($_SERVER['REQUEST_METHOD']==='POST'){
        
        //crea una nueva instancia
        $propiedad=new propiedad($_POST['propiedad']);
        
        //subida de archivos
        
        //generar nombre unico para la imagen a guardar
        $nombreImagen= md5( uniqid( rand(), true ) ) . '.jpg';
        //setear la imagen
        //realiza un resize a la imagen con intervention
        if($_FILES['propiedad']['tmp_name']['imagen']){
            // debuguear($_FILES);
            
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
            
            $propiedad->setImagen($nombreImagen);
            
        }
        //validar
        $errores=$propiedad->validar();
        
        //revisar q array errores este vacio
        if(empty($errores)){
            //crear una carpeta
            
            if(!is_dir(CARPETA_IMAGENES))mkdir(CARPETA_IMAGENES);
            
            //guarda la imagen en el servidor
            // debuguear(CARPETA_IMAGENES.'/'.$nombreImagen);
            $image->save(CARPETA_IMAGENES.$nombreImagen);
            //guarda en la BD
            $propiedad->guardar();
        }
        
    }

    //var_dump($db);
    
    incluirTemplates('header');
?>
<main class="contenedor seccion">
    <h1>Crear nueva propiedad</h1>
    <a href="../index.php" class="boton boton-verde-inline">Volver</a>
    <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php   echo $error; ?>
        </div>
    <?php endforeach; ?>
    <form action="crear.php" class="formulario" method="POST" enctype="multipart/form-data">
        <?php include '../../includes/templates/formulario_propiedades.php' ?>
        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>
</main>
<?php
    incluirTemplates('footer');
?>
