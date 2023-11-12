<?php
$userId = $_POST['userId'];

require __DIR__ . '/../conexion.php';

// Consultar el estado actual del usuario
$sql = "SELECT estado FROM Usuarios WHERE idUsuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $currentState = $row['estado'];

    // Cambiar el estado y actualizar la base de datos
    $newState = ($currentState == 0) ? 1 : 0;
    $updateSql = "UPDATE Usuarios SET estado = $newState WHERE idUsuario = $userId";

    if ($conn->query($updateSql) === TRUE) {
        echo "Estado actualizado correctamente";
    } else {
        echo "Error al actualizar el estado: " . $conn->error;
    }
} else {
    echo "Usuario no encontrado";
}

$conn->close();
?>