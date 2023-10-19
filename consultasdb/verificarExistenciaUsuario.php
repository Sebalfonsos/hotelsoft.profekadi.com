<?php
require 'consultasdb/conexion.php';
function verificarUsuarioExistente($identificacion, $correoelectronico){
    global $conn;

    $sql = "SELECT * FROM Usuarios WHERE idUsuario = ? OR correoelectronico = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $identificacion, $correoelectronico);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $conn->close();

    return $result->fetch_assoc();
}
?>