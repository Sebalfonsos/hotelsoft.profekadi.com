<?php
require 'consultasdb/conexion.php';
function registrarUsuario($identificacion, $contrasenahash, $nombres, $apellidos, $correoelectronico, $telefono, $tipoIdentificacion) {
    global $conn;
   
    $insertQuery = "INSERT INTO `Usuarios` (`idUsuario`, `contrasena`, `nombre`, `apellido`, `correoelectronico`, `telefono`, `TipoIdentificacion_idTipoIdentificacion`) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("isssssi", $identificacion, $contrasenahash, $nombres, $apellidos, $correoelectronico, $telefono, $tipoIdentificacion);

    $result1 = $stmt->execute();
    $stmt->close();
 
    if($result1){

        $insertQuery2 = "INSERT INTO `Clientes` (`Usuarios_idUsuario`) VALUES (?) ";
        $stmt = $conn->prepare($insertQuery2);
        $stmt->bind_param("i",$identificacion);

        $result2 = $stmt->execute();
        $stmt->close();
        $conn->close();
    }

  
    return $result1 AND $result2;
}
?>