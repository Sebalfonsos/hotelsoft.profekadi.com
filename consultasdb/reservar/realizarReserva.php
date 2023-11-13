<?php
require __DIR__ . '/../conexion.php';
$habitacion = $_POST['habitacion'];
$fechaEntrada = $_POST['fechaEntrada'];
$fechaSalida = $_POST['fechaSalida'];
$idCliente = $_POST['idCliente'];
$costoTotal = $_POST['costoTotal'];

$sql = "SELECT * FROM Clientes WHERE Usuarios_idUsuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $idCliente);
$stmt->execute();
$resultado = $stmt->get_result();
$row = $resultado->fetch_assoc();
$idClienteREAL = $row['idCliente'];

$stmt->close();

// Insertar en la tabla 'reservas'
$stmtReservas = $conn->prepare("INSERT INTO Reservas (fechaEntrada, fechaSalida, Clientes_idClientes, precioTotal) VALUES (?, ?, ?, ?)");
$stmtReservas->bind_param("sssi", $fechaEntrada, $fechaSalida, $idClienteREAL, $costoTotal);
$stmtReservas->execute();

// Obtener el ID de la reserva recién insertada
$idReserva = $stmtReservas->insert_id;


//AQUI TENGO QUE PONER UN TRIGGER

// Insertar en la tabla 'Habitaciones_has_Reservas'
$stmtHabitacionesReservas = $conn->prepare("INSERT INTO Habitaciones_has_Reservas (Habitaciones_idHabitacion, Reservas_idReserva) VALUES (?, ?)");
$stmtHabitacionesReservas->bind_param("ss", $habitacion, $idReserva);
$stmtHabitacionesReservas->execute();

// Cierra las conexiones
$stmtReservas->close();
$stmtHabitacionesReservas->close();
$conn->close();

echo 'Reserva exitosa';
?>