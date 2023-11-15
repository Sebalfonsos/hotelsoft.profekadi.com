<?php
require __DIR__.'/../conexion.php';
$query = "SELECT idUsuario FROM Usuarios WHERE Roles_idRoles = 2";
$result = $conn->query($query);

// Obtiene los resultados y los envía como JSON
$sugerencias = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sugerencias[] = $row['idUsuario'];
    }
}

echo json_encode($sugerencias);

// Cierra la conexión a la base de datos
$conn->close();
?>