<?php
    require 'includes/app.php';
    session_start();
use App\Habitacion;

    //valido si hay algo en el get
    $id=filter_var($_GET['id'], FILTER_VALIDATE_INT);
    //si no hay id los enviamos al index principal
    if(!$id){
        header('Location: index.php');
    }
    $habitacion=Habitacion::find($id);
    
    incluirTemplates('header');
?>
    <main class="contenedor seccion contenido-centrado">
        <div class="resumen-habitacion">
            <h1><?php echo $habitacion->titulo ?></h1>
            <img loading="lazy" src="<?php __DIR__ ;?>imagenes/<?php echo $habitacion->imagen; ?>" alt="anuncio">
            <p class="precio">$<?php echo $habitacion->precio ?></p>
            <p><?php echo $habitacion->descripcion ?></p>
            <hr>
                <?php if ($habitacion->disponibilidad == 1): ?>
                    <div class="alinear-centro">
                        <?php if (isset($_SESSION['usuario_id'])): ?>
                            <!-- Usuario logueado, mostrar botón de reserva -->
                            <form method="POST">
                                <input type="hidden" name="id_habitacion" value="<?php echo $id; ?>">
                                <button id="btn-reserva" type="button" class="boton boton-verde">Reservar Ahora</button>
                            </form>
                            <br><br><br>
                            
                        <?php else: ?>
                            <!-- Usuario no logueado, invitar a iniciar sesión -->
                            <p class="alerta" >Para reservar, debes <a href="loginUsuario.php">iniciar sesión</a>.</p>
                        <?php endif; ?>
                    
                    
                    </div>
                    
                <?php else: ?>
                    <p class="alerta">Lo sentimos, esta habitación no está disponible en este momento.</p>
                <?php endif; ?>
        </div>
    </main>
    <!-- Modal para Reserva -->
    <div id="modal-reserva" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <form action="reservas/nueva.php" method="POST" class="formulario">
                <h2>Reservar Habitación</h2>
                <input type="hidden" name="id_habitacion" value="<?php echo $id; ?>">
                <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['usuario_id']; ?>">
                <input type="hidden" name="estado" value="pendiente"> <!-- estado de la reserva por default -->
                <label for="fecha_entrada">Fecha de Entrada:</label>
                <input type="date" id="fecha_entrada" name="fecha_entrada" required>
                <label for="fecha_salida">Fecha de Salida:</label>
                <input type="date" id="fecha_salida" name="fecha_salida" required>
                <button type="submit" class="boton boton-verde">Confirmar Reserva</button>
            </form>
        </div>
    </div>

    <script>

        var modal = document.getElementById('modal-reserva');
    

        var btn = document.getElementById('btn-reserva');
    

        var span = document.getElementsByClassName("cerrar")[0];
    

        btn.onclick = function() {
            modal.style.display = "block";
        }
    

        span.onclick = function() {
            modal.style.display = "none";
        }
    

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    
    </script>

    <?php incluirTemplates('footer'); ?>