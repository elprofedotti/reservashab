<?php
    
    //require 'includes/app.php';
    //no se importa funciones, sino app, pq app importa funciones.php
    require 'includes/app.php';
    incluirTemplates('header');
    
?>
<main class="contenedor">
    <div id="message">Login Correcto</div>
</main>
<script>
        setTimeout(function() {
            document.getElementById('message').style.display = 'none';
            window.location.href = 'index.php';
        }, 1500);
</script>
</body>
</html>
