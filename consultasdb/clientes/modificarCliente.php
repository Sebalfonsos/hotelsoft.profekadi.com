<?php

require __DIR__ . '/../conexion.php';
$idUsuario = $_POST['idUsuario'];
$tipoDocumento = $_POST['tipoDocumento'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$correoElectronico = $_POST['correoElectronico'];
$telefono = $_POST['telefono'];


$sql = "UPDATE Usuarios SET TipoIdentificacion_idTipoIdentificacion = ?, nombre = ?, apellido = ?, correoelectronico = ?, telefono = ? WHERE idUsuario = ?";
$stmt = $conn->prepare($sql);

// Verificar si la preparación fue exitosa
if ($stmt) {
    // Vincular los parámetros
    $stmt->bind_param("sssssi", $tipoDocumento, $nombres, $apellidos, $correoElectronico, $telefono, $idUsuario);

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