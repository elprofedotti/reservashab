<?php

use App\Reserva;
use App\Habitacion;

    require 'includes/app.php';
    session_start();
  
    incluirTemplates('header');
    if (!isset($_SESSION['login']) || $_SESSION['usuario_tipo'] != 0) {
        // Si no está logueado o no es administrador, redirigir al login o a la página principal
        header('Location: loginUsuario.php');
        exit;
    }
    $reservas= Reserva::all();
    
    
    ?>
    
    <h1>Reservas</h1>
    <table class="tabla-responsive reservas">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Habitación</th>
                <th>Fecha de Entrada</th>
                <th>Fecha de Salida</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservas as $reserva): ?>
            <tr>
                <td><?php echo htmlspecialchars($reserva->id); ?></td>
                <td><?php echo htmlspecialchars($reserva->id_cliente); ?></td>
                <td><?php echo htmlspecialchars($reserva->id_habitacion); ?></td>
                <td><?php echo htmlspecialchars($reserva->fecha_inicio); ?></td>
                <td><?php echo htmlspecialchars($reserva->fecha_fin); ?></td>
                <td><?php echo htmlspecialchars($reserva->estado); ?></td>
                <td>
                    <a href="editar_reserva.php?id=<?php echo $reserva->id; ?>">Editar</a>
                    <a href="borrar_reserva.php?id=<?php echo $reserva->id; ?>" onclick="return confirm('¿Está seguro que desea eliminar esta reserva?');">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <h1>Habitaciones</h1>
<table class="tabla-responsive habitaciones">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tipo</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $habitaciones = Habitacion::all(); // Obtiene todas las habitaciones
        foreach ($habitaciones as $habitacion): ?>
        <tr>
            <td><?php echo htmlspecialchars($habitacion->id); ?></td>
            <td><?php echo htmlspecialchars($habitacion->tipo); ?></td>
            <td><?php echo htmlspecialchars($habitacion->precio); ?></td>
            <td>
                <a href="editar_habitacion.php?id=<?php echo $habitacion->id; ?>">Editar</a>
                <a href="borrar_habitacion.php?id=<?php echo $habitacion->id; ?>" onclick="return confirm('¿Está seguro que desea eliminar esta habitación?');">Eliminar</a>
            </td>
        </tr>
        
        <?php endforeach; ?>
    </tbody>
</table>
<div class="alinear-centro">
    <a href="crear_habitacion.php" class="boton-amarillo-inline">Crear Nueva Habitación</a>
</div>
    
<?php incluirTemplates('footer'); ?>

<script>
// Función para agregar atributos data-label a las celdas de una tabla
function addDataLabels(table) {
    var table = document.querySelector(table);
    var headers = table.querySelectorAll('th');

    table.querySelectorAll('tr').forEach(function(row) {
        row.querySelectorAll('td').forEach(function(cell, index) {
            cell.setAttribute('data-label', headers[index].textContent);
        });
    });
}

// Aplicar la función a cada tabla
addDataLabels('.reservas');
addDataLabels('.habitaciones');
</script>

