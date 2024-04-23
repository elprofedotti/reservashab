<?php
    // require 'includes/funciones.php';
    require 'includes/app.php';
    
    incluirTemplates('header');
?>
    <main class="contenedor seccion">
        <h2>Habitaciones disponibles</h2>
        
            <?php
                include 'includes/templates/anuncios.php';
            ?>
            
        
    </main>
    <?php
        incluirTemplates('footer');
    ?>