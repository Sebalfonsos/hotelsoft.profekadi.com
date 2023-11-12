<?php
require __DIR__ . '/../conexion.php';

$userId = $_POST['userId'];
$newPassword = $_POST['newPassword'];

// Hash de la nueva contraseña (puedes ajustar el método de hash según tus necesidades)
$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

// Actualizar la contraseña en la base de datos con sentencias preparadas
$updateSql = "UPDATE Usuarios SET contrasena = ? WHERE idUsuario = ?";
$stmt = $conn->prepare($updateSql);

if ($stmt) {
    // Vincular parámetros
    $stmt->bind_param("si", $hashedPassword, $userId);

    // Ejecutar la sentencia
    if ($stmt->execute()) {
        echo "Contraseña actualizada correctamente";
    } else {
        echo "Error al actualizar la contraseña: " . $stmt->error;
    }

    // Cerrar la sentencia preparada
    $stmt->close();
} else {
    echo "Error al preparar la sentencia: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>