<?php

require __DIR__ . '/../conexion.php';
$idUsuario = $_POST['idUsuario'];
$tipoDocumento = $_POST['tipoDocumento'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$correoElectronico = $_POST['correoElectronico'];
$telefono = $_POST['telefono'];
$rol = $_POST['rol'];

// Verificar si ya existe un usuario con el nuevo correo electrónico
$sqlVerificarCorreo = "SELECT idUsuario FROM Usuarios WHERE correoelectronico = ? AND idUsuario != ?";
$stmtVerificarCorreo = $conn->prepare($sqlVerificarCorreo);

// Verificar si la preparación fue exitosa
if ($stmtVerificarCorreo) {
    // Vincular el parámetro
    $stmtVerificarCorreo->bind_param("si", $correoElectronico, $idUsuario);

    // Ejecutar la consulta
    $stmtVerificarCorreo->execute();

    // Almacenar el resultado
    $stmtVerificarCorreo->store_result();

    // Verificar si hay algún resultado (si el correo ya está en uso)
    if ($stmtVerificarCorreo->num_rows > 0) {
        echo "Error: El correo electrónico ya está en uso";
        // Cerrar la conexión y salir del script
        $stmtVerificarCorreo->close();
        $conn->close();
        exit();
    }

    // Cerrar la consulta preparada de verificación
    $stmtVerificarCorreo->close();
} else {
    echo "Error al preparar la consulta de verificación: " . $conn->error;
    // Cerrar la conexión y salir del script
    $conn->close();
    exit();
}

// Si llegamos aquí, significa que el correo electrónico no está en uso y podemos continuar con la actualización

$sql = "UPDATE Usuarios SET TipoIdentificacion_idTipoIdentificacion = ?, nombre = ?, apellido = ?, correoelectronico = ?, telefono = ?, Roles_idRoles = ?  WHERE idUsuario = ?";
$stmt = $conn->prepare($sql);

// Verificar si la preparación fue exitosa
if ($stmt) {
    // Vincular los parámetros
    $stmt->bind_param("ssssssi", $tipoDocumento, $nombres, $apellidos, $correoElectronico, $telefono, $rol, $idUsuario);


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
