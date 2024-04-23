<?php
    
    //require 'includes/app.php';
    //no se importa funciones, sino app, pq app importa funciones.php
    require 'includes/app.php';
    incluirTemplates('header');
    if($_SERVER['REQUEST_METHOD'] === 'GET' ?? null){
        $idhabitacion = $_GET['id'];
        
        ?>
        <main class="contenedor">
            <div id="message">La habitación no está disponible para las fechas seleccionadas.</div>
        </main>
        <script>
                setTimeout(function() {
                    document.getElementById('message').style.display = 'none';
                    window.location.href = 'anuncio.php?id=<?php echo $idhabitacion; ?>';
                }, 2500);

        </script>
        </body>
        </html>
    
<?php
    }
?>

