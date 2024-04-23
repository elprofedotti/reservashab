<?php
    require '../../includes/app.php';
    use App\Vendedor;

    estaAutenticado();
    // Validar la URL por ID válido
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) header('location: ../index.php');
    
    // Obtener los datos del vendedor a editar...
    $vendedor = Vendedor::find($id);
    
    // Arreglo con mensajes de errores
    $errores = Vendedor::getErrores();

    // Ejecutar el código después de que el usuario envia el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Asignar los atributos
        $args = $_POST['vendedor'];

        $vendedor->sincronizar($args);

        // Validación
        $errores = $vendedor->validar();
       

        if(empty($errores)) {
            $vendedor->guardar();
        }
    }
    incluirTemplates('header');
?>

    <main class="contenedor seccion">
        <h1>Actalizacion de vendedor(a)</h1>

        <a href="../index.php" class="boton-verde-inline">Volver</a>

        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" enctype="multipart/form-data">
            <?php include '../../includes/templates/formulario_vendedores.php'; ?>

            <input type="submit" value="Guardar cambios" class="boton-verde">
        </form>
        
    </main>

<?php 
    incluirTemplates('footer');
?> 