<?php
    //require 'includes/funciones.php';
    require 'includes/app.php';
    
    incluirTemplates('header');
?>
    <main class="contenedor seccion">
        <h1>Conoce sobre Nosotros</h1>
        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="webp">
                    <source srcset="build/img/nosotros.jpg" type="jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre nosotros">
                </picture> 
            </div>
            <div class="texto-nosotros">
                <blockquote>
                    25 años de experiencia
                </blockquote>
                <p>Sobre nosotros
                </p>
                <p>segundo parrafo
                </p>
                
            </div>
        </div>
    </main>
    <section class="contenedor seccion">
        <h1>Más sobre nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Seguridad y mas</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="icono precio" loading="lazy">
                <h3>Precio</h3>
                <p>precios unicos y para vos</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="icono tiempo" loading="lazy">
                <h3>A tiempo</h3>
                <p>Ponderamos el tiempo, la clave de este mundo</p>
            </div>
        </div>
    </section>
    <?php
        incluirTemplates('footer');
    ?>