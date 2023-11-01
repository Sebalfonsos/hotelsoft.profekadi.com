<?php
function traerDatosHabitaciones()
{
    require __DIR__ . '/../conexion.php';

    $sql = "SELECT * FROM Habitaciones";

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
                $row["tipoHabitacion"],
                $row["precioHabitacion"],
                $row["estado"],
                ''
            );
        }
    }
    return json_encode($data);
}
?>