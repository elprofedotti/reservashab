<?php
    //require 'includes/funciones.php';
    require 'includes/app.php';
    
    incluirTemplates('header');
?>
    <main class="contenedor seccion contenido-centrado">
        <h1>Terraza en el techo de tu casa </h1>
        <picture>
            <source srcset="build/img/destacada2.webp" type="webp">
            <source srcset="build/img/destacada2.jpg" type="jpeg">
            <img loading="lazy" src="build/img/destacada2.jpg" alt="imagen de la propiedad">

        </picture>
        <div class="resumen-propiedad">
            <p class="informacion-meta">Escrito el <span>27/4/23</span> por <span>Admin</span></p>
            
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deserunt ab ratione quaerat possimus consectetur sit odio architecto suscipit ad, veritatis qui esse molestias, sunt omnis soluta laboriosam culpa quasi facere.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, totam facilis architecto deserunt veniam omnis a. Magni, libero ipsum fugiat odit quos quas, dignissimos quasi a ipsa reprehenderit adipisci ducimus!
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore perspiciatis nesciunt nisi deserunt, incidunt harum magnam laboriosam maiores iure. Dignissimos est ex voluptates accusamus eius ducimus? Voluptates maiores deleniti fuga?
            </p>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deserunt ab ratione quaerat possimus consectetur sit odio architecto suscipit ad, veritatis qui esse molestias, sunt omnis soluta laboriosam culpa quasi facere.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, totam facilis architecto deserunt veniam omnis a. Magni, libero ipsum fugiat odit quos quas, dignissimos quasi aipsaaccusamus eius ducimus? Voluptates maiores deleniti fuga?
            </p>
        </div>
    </main>
    <?php
        incluirTemplates('footer');
    ?>