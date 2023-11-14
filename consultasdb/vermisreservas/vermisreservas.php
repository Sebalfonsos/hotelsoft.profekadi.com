<?php
function traerDatosReserva()
{
    require __DIR__ . '/../conexion.php';

    
    $idUsuario = $_SESSION['id_usuario'];

    $sql = "SELECT Reservas.idReserva,Habitaciones.numHabitacion,Habitaciones.tipoHabitacion, Reservas.fechaEntrada, Reservas.fechasalida, Reservas.precioTotal, Reservas.estadoReserva
    FROM Reservas
    JOIN Clientes ON Reservas.Clientes_idClientes = Clientes.idCliente
    JOIN Usuarios ON Clientes.Usuarios_idUsuario = Usuarios.idUsuario
    JOIN Habitaciones_has_Reservas ON Reservas.idReserva = Habitaciones_has_Reservas.Reservas_idReserva
    JOIN Habitaciones ON Habitaciones_has_Reservas.Habitaciones_idHabitacion = Habitaciones.idHabitacion
    WHERE Usuarios.idUsuario = ? ORDER BY idReserva DESC";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("i",$idUsuario);

    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $conn->close();
    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = array(
                $row["idReserva"],
                $row["numHabitacion"],
                $row["tipoHabitacion"],
                $row["fechaEntrada"],
                $row["fechasalida"],
                $row["precioTotal"],
                $row["estadoReserva"]
            );
        }
    }

    return json_encode($data);
}
?>