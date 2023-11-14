<?php

require __DIR__ . '/../conexion.php';
$numHabitacion = $_POST['numHabitacion'];
$tipoHabitacion = $_POST['tipoHabitacion'];
$precioHabitacion = $_POST['precioHabitacion'];



$sql = "UPDATE Habitaciones SET tipoHabitacion = ?, precioHabitacion = ? WHERE numHabitacion = ?";
$stmt = $conn->prepare($sql);

// Verificar si la preparación fue exitosa
if ($stmt) {
    // Vincular los parámetros
    $stmt->bind_param("sii", $tipoHabitacion, $precioHabitacion, $numHabitacion);

    // Ejecutar la sentencia
    if ($stmt->execute()) {
        echo "Modificación exitosa";
    } else {
        echo "Error al modificar el cliente: " . $stmt->error;
    }

    // Cerrar la sentencia preparada
    $stmt->close();
} else {
    echo "Error al preparar la sentencia: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
