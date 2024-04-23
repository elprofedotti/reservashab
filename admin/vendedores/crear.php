<?php
    require '../../includes/app.php';
    use App\Vendedor;

    

    // Arreglo con mensajes de errores
    $vendedor = new Vendedor;
    estaAutenticado();
    
    $errores = Vendedor::getErrores();
    
    // Ejecutar el código después de que el usuario envia el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        /** Crea una nueva instancia */
        $vendedor = new Vendedor($_POST['vendedor']);
        
        //con uina expresion regular validamos que sea un telefono en formato correcto
        //VER PORQ TIRA ERROR
        /* if(!preg_match('/[0-9]{13}/', $this->telefono)) {
            self::$errores[] = "Teléfono no válido";
        } */
        
        // Validar
        $errores = $vendedor->validar();

        if(empty($errores)) {
            $vendedor->guardar();
        }

    }
    incluirTemplates('header');
?>

    <main class="contenedor seccion">
        <h1>Registro de vendedor(a)</h1>

        

        <a href="../index.php" class="boton-verde-inline">Volver</a>

        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" action="crear.php" enctype="multipart/form-data">
            <?php include '../../includes/templates/formulario_vendedores.php'; ?>

            <input type="submit" value="Registrar Vendedor" class="boton-verde">
        </form>
        
    </main>

<?php 
    incluirTemplates('footer');
?> 