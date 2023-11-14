<?php
require __DIR__ . '/../conexion.php';
$sql = "SELECT Reservas.*,Habitaciones.*, Usuarios.idUsuario, Usuarios.nombre, Usuarios.apellido FROM Habitaciones_has_Reservas JOIN Habitaciones ON Habitaciones_has_Reservas.Habitaciones_idHabitacion = Habitaciones.idHabitacion JOIN Reservas ON Habitaciones_has_Reservas.Reservas_idReserva = Reservas.idReserva JOIN Clientes ON Reservas.Clientes_idClientes = Clientes.idCliente JOIN Usuarios ON Clientes.Usuarios_idUsuario = Usuarios.idUsuario;
";
$result = $conn->query($sql);

// Crear un array para almacenar los eventos
$events = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Formatear los datos según el formato de FullCalendar
        $event = array(
            'id' => $row['idReserva'],
            'title' => " Habitación numero: ".$row['numHabitacion']." | ".$row['idUsuario']." | ".$row['nombre']." ".$row['apellido'],
            'start' => $row['fechaEntrada'],
            'end' => $row['fechasalida'],
            'idUsuario' => $row['idUsuario'],
            'nombreUsuario' => $row['nombre'],
            'apellidoUsuario' => $row['apellido'],
            'habitacionNumero' => $row['numHabitacion'],
            'precioTotal' => $row['precioTotal'],
            'tipoHabitacion' => $row['tipoHabitacion'],
            'fechaEntrada' => $row['fechaEntrada'],
            'fechaSalida' => $row['fechasalida']
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