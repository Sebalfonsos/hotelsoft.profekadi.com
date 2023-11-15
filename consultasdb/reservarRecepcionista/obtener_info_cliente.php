<?php

require __DIR__ . '/../conexion.php';
$idCliente = $_POST['idCliente'];
$sql = "SELECT nombre, apellido, correoelectronico, telefono FROM Usuarios WHERE idUsuario = ?";

// Prepara la sentencia SQL
$stmt = $conn->prepare($sql);

// Vincula el parámetro
$stmt->bind_param("i", $idCliente);

// Ejecuta la consulta
$stmt->execute();

// Obtiene los resultados como un array asociativo
$infoCliente = $stmt->get_result()->fetch_assoc();

// Cierra la sentencia y la conexión
$stmt->close();
$conn->close();

// Devuelve la información del cliente en formato JSON
echo json_encode($infoCliente);


?>