<?php

// Tu lógica para la conexión a la base de datos
require __DIR__ . '/../conexion.php';

// Recibir parámetros del POST
$idHabitacion = $_POST['idHabitacion'];
$fechaEntrada = $_POST['fechaEntrada'];
$fechaSalida = $_POST['fechaSalida'];


// Realizar la consulta para obtener el precio de la habitación
$sql = "SELECT precioHabitacion FROM Habitaciones WHERE idHabitacion = ?";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("s", $idHabitacion);
    $stmt->execute();
    $stmt->bind_result($precio);
    $stmt->fetch();
    $stmt->close();

    
    $diferenciaDias = (strtotime($fechaSalida) - strtotime($fechaEntrada)) / (60 * 60 * 24);
    // Calcular el precio total
    $precioTotal = $precio * $diferenciaDias;

    // Devolver el precio total como respuesta
    echo $precioTotal;
} else {
    echo "Error al preparar la consulta: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
