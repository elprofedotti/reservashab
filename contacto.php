<?php
    //require 'includes/funciones.php';
    require 'includes/app.php';
    
    incluirTemplates('header');
?>
    <main class="contenedor seccion">
        <h1>Contacto</h1>
        <picture>
            <source srcset="build/img/destacada3.webp" type="webp">
            <source srcset="build/img/destacada3.jpg" type="jpeg">
            <img loading="lazy" src="build/img/destacada3.jpg" alt="imagen contacto">
        </picture>
        <h2>Llene el formulario de contacto</h2>
        <form action="" class="formulario">
            <fieldset>
                <legend>Informacion personal</legend>
                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu Nombre" id="nombre">
                <label for="email">Email</label>
                <input type="email" placeholder="Tu Email" id="email">
                <label for="celular">Celular</label>
                <input type="tel" placeholder="Tu Celular" id="celular">
                <label for="mensaje">Mensaje</label>
                <textarea id="mensaje"></textarea>
            </fieldset>
            
                
            <fieldset>
                <legend>Contacto</legend>
                <p>Como desea ser contactado</p>
                <div class="forma-contacto">
                    <label for="contactar-celular">Celular</label>
                    <input type="radio" value="celular" id="contactar-celular" name="contacto">
                    <label for="contactar-email">Email</label>
                    <input type="radio" value="email" id="contactar-email" name="contacto">
                </div>
                <p>Si eligio celular, elija fecha y hora para ser contactado</p>
                
                <label for="fecha">Fecha</label>
                <input type="date" id="fecha">
                <label for="hora">Hora</label>
                <input type="time" id="hora">
            </fieldset>
            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </main>
    <?php
       incluirTemplates('footer');
    ?>