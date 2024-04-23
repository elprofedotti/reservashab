<?php
    
    //require 'includes/app.php';
    //no se importa funciones, sino app, pq app importa funciones.php
    require 'includes/app.php';
    incluirTemplates('header',$inicio=true);
    
?>
    <main class="contenedor seccion">
        <h1>Más sobre NOSOTROS</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>En los barrios zapalinos, se encuentran gran variedad de casas hermosas con llanuras interminables. MADHAV</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="icono precio" loading="lazy">
                <h3>Precio</h3>
                <p>aca algo sobnre precios</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="icono tiempo" loading="lazy">
                <h3>A tiempo</h3>
                <p>aca algo sobre los tiempos</p>
            </div>
        </div>
    </main>
    <section class="seccion contenedor">
        <h2>Habitaciones disponibles</h2>
            <?php include 'includes/templates/anuncios.php'; ?>
        <div class="alinear-derecha">
            <a href="anuncios.php" class="boton-verde">Ver Todas</a>
        </div>
    </section>
    <section class="imagen-contacto">
    
        <h2>Encuentra la habitación de tus sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondra en contacto contigo a la brevedad</p>
        <a href="contacto.php" class="boton-amarillo-inline">Contáctanos</a>

    </section>
    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro BLOG</h3>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="webp">
                        <source srcset="build/img/blog1.jpg" type="jpeg">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="texto entrada blog">
                    </picture>    
                </div>
                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el <span>27/4/23</span> por <span>Admin</span></p>
                        <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero.</p>
                    </a>
                </div>
            </article>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="webp">
                        <source srcset="build/img/blog2.jpg" type="jpeg">
                        <img loading="lazy" src="build/img/blog2.jpg" alt="texto entrada blog">
                    </picture>    
                </div>
                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Guía para la decoración de tu espacio</h4>
                        <p class="informacion-meta">Escrito el <span>27/4/23</span> por <span>Admin</span></p>
                        <p>Maximiza el espacio de tu habitación con esta guía, aprende a combinar muebles y colores para darle vida a tu espacio.</p>
                    </a>
                </div>
            </article>
        </section>
        <section class="testimoniales">
                <h3>Testimoniales</h3>
                <div class="testimonial">
                    <blockquote>
                        El personal se comportó de una excelente forma, muy buena atención y la habitacion que me ofrecieron cumple con todas mis expectativas.
                    </blockquote>
                    <p>- Mati D.</p>
                </div>
        </section>
        
    </div>
    <?php
        incluirTemplates('footer');
    ?>