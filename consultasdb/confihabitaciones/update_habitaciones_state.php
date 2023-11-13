<?php
$idHabitacion = $_POST['idHabitacion'];

require __DIR__ . '/../conexion.php';

// Consultar el estado actual del usuario
$sql = "SELECT estado FROM Habitaciones WHERE idHabitacion = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $idHabitacion);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $currentState = $row['estado'];

    // Cambiar el estado y actualizar la base de datos
    $newState = ($currentState == 0) ? 1 : 0;
    $updateSql = "UPDATE Habitaciones SET estado = $newState WHERE idHabitacion = $idHabitacion";

    if ($conn->query($updateSql) === TRUE) {
        echo "Estado actualizado correctamente";
    } else {
        echo "Error al actualizar el estado: " . $conn->error;
    }
} else {
    echo "Habitacion no encontrada";
}

$conn->close();
?>