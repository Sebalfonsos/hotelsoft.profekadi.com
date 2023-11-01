<?php
require __DIR__ . '/../conexion.php';

// Obtener los valores enviados por el formulario
$documento = $_POST['documento'];
$tipoDocumento = $_POST['tipoDocumento'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correoElectronico = $_POST['correoElectronico']; 
$contrasenahash = password_hash($_POST["contrasena"], PASSWORD_DEFAULT);
$telefono = $_POST['telefono'];
$rol = $_POST['rol']; 
$estado = $_POST['estado'];

// Verificar si el usuario ya existe en la base de datos
$queryUsuarios = "SELECT * FROM Usuarios WHERE idUsuario = ?";
$stmt = $conn->prepare($queryUsuarios);
$stmt->bind_param("s", $documento);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows < 1) {
    // El usuario no existe, entonces lo insertamos
    $insertQuery = "INSERT INTO Usuarios (idUsuario, TipoIdentificacion_idTipoIdentificacion, nombre, apellido, correoElectronico, contrasena,telefono, Roles_idRoles, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("sssssssss", $documento, $tipoDocumento, $nombre, $apellido, $correoElectronico, $contrasenahash, $telefono, $rol, $estado);

    if ($stmt->execute()) {
        // Inserción exitosa
        echo "success";
    } else {
        // Error en la inserción
        echo "error";
    }
} else {
    // El usuario ya existe en la base de datos
    echo "errorExiste";
}

$stmt->close();
$conn->close();
?>