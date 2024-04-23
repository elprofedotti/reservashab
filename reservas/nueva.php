<?php

use App\Reserva;

require '../includes/app.php';
$db = conectarDB();



$reserva=new Reserva;
estaAutenticado();

$errores = Reserva::getErrores();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos del formulario
    $id_habitacion = $_POST['id_habitacion'];
    $id_usuario = $_POST['id_usuario'];  // Asegúrate de validar y sanear este dato
    $estado = $_POST['estado'];
    $fecha_entrada = $_POST['fecha_entrada'];
    $fecha_salida = $_POST['fecha_salida'];
    
    // Verifica la disponibilidad de la habitación
    $query = "SELECT * FROM reservas WHERE id_habitacion = ${id_habitacion} AND NOT (fecha_fin <= '${fecha_entrada}' OR fecha_inicio >= '${fecha_salida}')";
    $resultado = mysqli_query($db, $query);

    if (mysqli_num_rows($resultado) === 0) {
        // Procesa la reserva
        $args = [
            'id_cliente' => $_SESSION['usuario_id'],  // Asume que el id del usuario está almacenado en la sesión
            'id_habitacion' => $id_habitacion,
            'fecha_inicio' => $fecha_entrada,
            'fecha_fin' => $fecha_salida,
            'estado' => 'pendiente'  // Estado inicial de la reserva
        ];
    
        $reserva = new Reserva($args);
        //validar
        $errores=$reserva->validar();
            
        //revisar q array errores este vacio
        if(empty($errores)){
            
            $reserva->guardar();
            header('Location: ../reservaOk.php'); 
        }
    }
    else {
        header('Location: ../ocupada.php?id='.$id_habitacion); 
        
    }
}
?>