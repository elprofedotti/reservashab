<?php
 
    require '../includes/app.php';
    estaAutenticado();
    use App\Propiedad;
    use App\Vendedor;
    
    //implementar metodo para obtener todas las propiedades utilizando active record
    $propiedades=Propiedad::all();
    
    $vendedores=Vendedor::all();
    
    
    

    //cheuqeo si existe resultado con ??, que es como usar isset y muestro mensaje condicional
    $resultado=$_GET['resultado'] ?? null;

    //chequeo el metodo, si es post, es porq se selecciono eliminar
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id=$_POST['id'];
        $id=filter_var($id, FILTER_VALIDATE_INT);

        if($id){
            if (validarTipoContenido($_POST['tipo'])){

                if($_POST['tipo']==='propiedad'){
                    $propiedad=Propiedad::find($id);
                    $propiedad->eliminar();
                }else{
                    
                    $vendedor=Vendedor::find($id);
                    $vendedor->eliminar();
                }
            }            
        }
    }

    //incluye un template
    incluirTemplates('header');
?>
<main class="contenedor seccion">
    <h1>Administrador de Bienes Raices</h1>
    <?php
        
        $mensaje = mostrarNotificacion( intval( $resultado) );
        if($mensaje) { ?>
            
            <p class="alerta exito"><?php echo s($mensaje); ?></p>
            
        <?php } ?>
    
    <a href="propiedades/crear.php" class="boton boton-verde-inline">Nueva Propiedad</a>
    <a href="vendedores/crear.php" class="boton boton-amarillo-inline">Nuevo(a) Vendedor</a>
    <h2>Propiedades</h2>
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody> <!-- mostrar los resultados -->
            <?php foreach($propiedades as $propiedad):?>
                <tr>
                    <td><?php echo $propiedad->id; ?></td>
                    <td><?php echo $propiedad->titulo; ?></td>
                    <td>
                        <img 
                            class="imagen-tabla"
                            src='<?php echo dirname($_SERVER['PHP_SELF']).'/../imagenes/'.$propiedad->imagen;?>' 
                            alt="imagen-tabla">
                    </td>
                    <td>U$S <?php echo $propiedad->precio; ?></td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id?>">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit" class="boton-rojo" value="Eliminar">
                        </form>
                        <a href="propiedades/actualizar.php?id=<?php echo $propiedad->id; ?>" class="boton-amarillo">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h2>Vendedores</h2>
    <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> <!-- Mostrar los Resultados -->
                <?php foreach( $vendedores as $vendedor ): ?>
                <tr>
                    <td><?php echo $vendedor->id; ?></td>
                    <td><?php echo $vendedor->nombre . " " . $vendedor->apellido; ?></td>
                    <td><?php echo $vendedor->telefono; ?></td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" class="boton-rojo" value="Eliminar">
                        </form>
                        
                        <a href="vendedores/actualizar.php?id=<?php echo $vendedor->id; ?>" class="boton-amarillo">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</main>
<?php
    incluirTemplates('footer');
?>