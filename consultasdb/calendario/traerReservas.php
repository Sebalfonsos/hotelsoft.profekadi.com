<?php

require __DIR__ .'/../conexion.php';

$sql = "SELECT idReserva, fechaEntrada, fechaSalida, Clientes_idClientes FROM Reservas";
$result = $conn->query($sql);

// Crear un array para almacenar los eventos
$events = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Formatear los datos según el formato de FullCalendar
        $event = array(
            'id' => $row['idReserva'],
            'title' => 'Reserva #' . $row['idReserva'],
            'start' => $row['fechaEntrada'],
            'end' => $row['fechaSalida'],
            'clientId' => $row['Clientes_idClientes'],
            'description' => "aa"
        );

        // Agregar el evento al array de eventos
        array_push($events, $event);
    }
}

// Cerrar la conexión a la base de datos
$conn->close();

// Convertir el array de eventos a formato JSON
echo 'var eventos = ' . json_encode($events) . ';';
?>