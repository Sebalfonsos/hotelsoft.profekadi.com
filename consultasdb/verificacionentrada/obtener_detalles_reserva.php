<?php

if (isset($_POST['idReserva'])) {
    require __DIR__.'/../conexion.php';
    $idReserva =  $_POST['idReserva'];
    $sql = "SELECT Reservas.fechaEntrada, Reservas.fechasalida, Usuarios.idUsuario, Usuarios.nombre, Usuarios.apellido, Usuarios.telefono, Usuarios.correoelectronico, Reservas.precioTotal FROM Reservas JOIN Clientes ON Reservas.Clientes_idClientes = Clientes.idCliente JOIN Usuarios ON Clientes.Usuarios_idUsuario = Usuarios.idUsuario WHERE idReserva = ?";

    // Prepara la sentencia SQL
    $stmt = $conn->prepare($sql);

    // Vincula el parámetro
    $stmt->bind_param("i", $idReserva);

    // Ejecuta la consulta
    $stmt->execute();

    // Vincula las variables de resultado
    $stmt->bind_result($fechaEntrada, $fechasalida, $idUsuario, $nombre, $apellido, $telefono, $correoelectronico, $precioTotal);

    // Obtiene los resultados
    $stmt->fetch();

    // Cierra la sentencia y la conexión
    $stmt->close();
    $conn->close();

    // Forma un array asociativo con los detalles de la reserva
    $detallesReserva = [
        'fechaEntrada' => $fechaEntrada,
        'fechasalida' => $fechasalida,
        'idUsuario' => $idUsuario,
        'nombre' => $nombre,
        'apellido' => $apellido,
        'telefono' => $telefono,
        'correoelectronico' => $correoelectronico,
        'precioTotal' => $precioTotal
    ];

    // Devuelve los detalles de la reserva en formato JSON
    echo json_encode($detallesReserva);
} else {
    // Si no se proporcionó la ID de reserva, devuelve un error
    echo json_encode(['error' => 'No se proporcionó la ID de reserva']);
}
?>
