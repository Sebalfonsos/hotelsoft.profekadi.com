
<?php
require 'conexion.php';
// Obtener los valores enviados por el formulario
$numHabitacion = $_POST['numHabitacion'];
$tipoHabitacion = $_POST['tipoHabitacion'];
$estadoHabitacion = $_POST['estadoHabitacion']; 
$precioHabitacion = $_POST['precioHabitacion'];

// Verificar si la habitación ya existe en la base de datos
$queryHabitaciones = "SELECT * FROM Habitaciones WHERE numHabitacion = ?";
$stmt = $conn->prepare($queryHabitaciones);
$stmt->bind_param("s", $numHabitacion);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows < 1) {
    // La habitación no existe, entonces la insertamos
    $insertQuery = "INSERT INTO Habitaciones (numHabitacion, tipoHabitacion,estado, precioHabitacion) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("sssd", $numHabitacion, $tipoHabitacion, $estadoHabitacion, $precioHabitacion);

    if ($stmt->execute()) {
        // Inserción exitosa
        echo "success";
    } else {
        // Error en la inserción
        echo "error";
    }
} else {
    // La habitación ya existe en la base de datos
    echo "errorExiste";
}

$stmt->close();
$conn->close();
?>
