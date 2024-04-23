<?php
    
    //require 'includes/app.php';
    //no se importa funciones, sino app, pq app importa funciones.php
    require 'includes/app.php';
    incluirTemplates('header');
    
?>
<main class="contenedor">
    <div id="message">Habitación reservada con estado PENDIENTE, le llegará un email de confirmación.</div>
</main>
<script>
        setTimeout(function() {
            document.getElementById('message').style.display = 'none';
            window.location.href = 'index.php';
        }, 2500);
</script>
</body>
</html>
