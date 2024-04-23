<?php
    use App\Habitacion;
    if($_SERVER['SCRIPT_NAME']==='/bienesraicespoo/anuncios.php'){
        $habitaciones=Habitacion::all();
    }else{
        $habitaciones=Habitacion::get(3);
    }
    
?>
    
    <div class="contenedor-anuncios">
        <?php
            foreach($habitaciones as $habitacion):
        ?>
        <div class="anuncio">
                
                <img loading="lazy" src="<?php __DIR__ ;?>imagenes/<?php echo $habitacion->imagen; ?>" alt="anuncio">
                
                <div class="contenido-anuncio">
                    <h3><?php echo $habitacion->titulo ?></h3>
                    <p><?php echo $habitacion->descripcion ?></p>
                    <p class="precio">$<?php echo $habitacion->precio ?></p>
                    <p><?php echo $habitacion->tipo ?></p>
                    <a href="anuncio.php?<?php echo "id=".$habitacion->id ?>" class="boton boton-amarillo">
                        Ver habitacion
                    </a>
                    
                </div><!-- .contenido-anuncio -->
        </div><!-- contenido-anuncio -->
        <?php
            endforeach;
        ?>
    </div><!-- .contenedor-anuncios -->