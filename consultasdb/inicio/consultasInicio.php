<?php
require __DIR__ . '/../conexion.php';

function totalHabitaciones()
{
    require __DIR__ . '/../conexion.php';

    $sql = "SELECT COUNT(*) as totalHabitaciones FROM Habitaciones";
    $result = $conn->query($sql);



    if ($result->num_rows > 0) {
        // Mostrar el resultado
        $row = $result->fetch_assoc();

        $result->close();
        $conn->close();
        return $row["totalHabitaciones"];
    } else {
        return "0";
    }



}

function totalHabitacionesLibres()
{

    require __DIR__ . '/../conexion.php';
    $sql = "SELECT count(h.idHabitacion) AS totalHabitacionesLibres FROM Habitaciones h WHERE h.idHabitacion NOT IN(SELECT hr.Habitaciones_idHabitacion FROM Habitaciones_has_Reservas hr JOIN Reservas r ON hr.Reservas_idReserva = r.idReserva WHERE CURDATE() >= r.fechaEntrada AND CURDATE() < r.fechaSalida)";
    $result = $conn->query($sql);



    if ($result->num_rows > 0) {
        // Mostrar el resultado
        $row = $result->fetch_assoc();

        $result->close();
        $conn->close();
        return $row["totalHabitacionesLibres"];
    } else {
        return "0";
    }

}

function totalHabitacionesOcupadas()
{

    require __DIR__ . '/../conexion.php';
    $sql = "SELECT count(hr.Habitaciones_idHabitacion) AS totalHabitacionesOcupadas FROM Habitaciones_has_Reservas hr JOIN Reservas r ON hr.Reservas_idReserva = r.idReserva WHERE CURDATE() >= r.fechaEntrada AND CURDATE() < r.fechaSalida";
    $result = $conn->query($sql);



    if ($result->num_rows > 0) {
        // Mostrar el resultado
        $row = $result->fetch_assoc();

        $result->close();
        $conn->close();
        return $row["totalHabitacionesOcupadas"];
    } else {
        return "0";
    }

}

function totalHabitacionesDesocupadas()
{

    require __DIR__ . '/../conexion.php';
    $sql = "SELECT count(*) AS totalHabitacionesDeshabilitadas FROM Habitaciones WHERE estado = 0;";
    $result = $conn->query($sql);



    if ($result->num_rows > 0) {
        // Mostrar el resultado
        $row = $result->fetch_assoc();

        $result->close();
        $conn->close();
        return $row["totalHabitacionesDeshabilitadas"];
    } else {
        return "0";
    }

}








function listaHabitacionesOcupadas()
{
    require __DIR__ . '/../conexion.php';

    $sql = "SELECT Habitaciones.numHabitacion, Usuarios.nombre, Usuarios.apellido, Usuarios.telefono, Reservas.fechaEntrada, Reservas.fechasalida, Reservas.precioTotal
    FROM Habitaciones_has_Reservas 
    JOIN Reservas ON Habitaciones_has_Reservas.Reservas_idReserva = Reservas.idReserva 
    JOIN Habitaciones ON Habitaciones.idHabitacion = Habitaciones_has_Reservas.Habitaciones_idHabitacion
    JOIN Clientes ON Clientes.idCliente = Reservas.Clientes_idClientes
    JOIN Usuarios ON Clientes.Usuarios_idUsuario = Usuarios.idUsuario
    WHERE CURDATE() >= Reservas.fechaEntrada AND CURDATE() < Reservas.fechaSalida";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $conn->close();
    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = array(
                $row["numHabitacion"],
                $row["nombre"],
                $row["apellido"],
                $row["telefono"],
                $row["fechaEntrada"],
                $row["fechasalida"],
                "$" . $row["precioTotal"]
            );
        }
    }

    return json_encode($data);
}

function ocupacionHabitaciones()
{

    require __DIR__ . '/../conexion.php';

    $sql = "
    SELECT
    m.mes,
    COUNT(r.idReserva) AS cantidad
FROM
    (
        SELECT 1 AS mes UNION SELECT 2 UNION SELECT 3 UNION SELECT 4
        UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8
        UNION SELECT 9 UNION SELECT 10 UNION SELECT 11 UNION SELECT 12
    ) m
LEFT JOIN Reservas r ON m.mes = MONTH(r.fechaEntrada) AND YEAR(r.fechaEntrada) = YEAR(CURDATE())
GROUP BY
    m.mes
ORDER BY
    m.mes;

    ";

    $result = $conn->query($sql);

    // Inicializar un array para almacenar las cantidades por mes
    $ocupacionPorMes = array();

    // Llenar el array con los datos de la consulta
    while ($row = $result->fetch_assoc()) {
        $mes = $row['mes'];
        $cantidad = $row['cantidad'];
        $ocupacionPorMes[] = $cantidad;
    }

    // Asegurar que el array tiene 12 elementos, rellenando con ceros si es necesario
    $ocupacionPorMes = array_pad($ocupacionPorMes, 12, 0);

    // Imprimir el array en formato JSON
    echo json_encode($ocupacionPorMes);


    // Cerrar la conexión
    $conn->close();
}

?>