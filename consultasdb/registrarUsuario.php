<?php
require 'consultasdb/conexion.php';
function registrarUsuario($identificacion, $contrasenahash, $nombres, $apellidos, $correoelectronico, $telefono, $tipoIdentificacion) {
    global $conn;
   
    $insertQuery = "INSERT INTO `Usuarios` (`idUsuario`, `contrasena`, `nombre`, `apellido`, `correoelectronico`, `telefono`, `TipoIdentificacion_idTipoIdentificacion`) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("isssssi", $identificacion, $contrasenahash, $nombres, $apellidos, $correoelectronico, $telefono, $tipoIdentificacion);

    $result = $stmt->execute();
    $stmt->close();
    return $result;
}
?>