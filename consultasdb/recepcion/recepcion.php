<?php

if (isset($_POST['habitacion']) && isset($_POST['fechaEntrada']) && isset($_POST['fechaSalida']) && isset($_POST['idCliente'])) {
    // Obtener datos de la solicitud AJAX
    $habitacion = $_POST['habitacion'];
    $fechaEntrada = strtotime($_POST['fechaEntrada']);
    $fechaSalida = strtotime($_POST['fechaSalida']);
    $idCliente = $_POST['idCliente'];

  
    
    habitacionOcupada($habitacion, $fechaEntrada, $fechaSalida, $idCliente);

}
require __DIR__ . '/../conexion.php';
$result = $conn->query("SELECT * FROM Habitaciones WHERE estado = '1'");

$habitaciones = array();

while ($row = $result->fetch_assoc()) {
    
    $habitaciones[] = array(
        'id' => $row['idHabitacion'],
        'numHabitacion' => $row['numHabitacion'],
        'tipoHabitacion' => $row['tipoHabitacion'],
        'estado' => $row['estado'],
        'precioHabitacion' => $row['precioHabitacion']
    );
}
$conn->close();





function traerHabitaciones()
{
    global $habitaciones;


    // Iniciar una fila
    echo '<div class="row">';

    foreach ($habitaciones as $habitacion) {

        echo '<div class="col-lg-3 col-6">
        <div class="small-box bg-success" id="'. $habitacion['numHabitacion'] .'">
          <div class="inner">
            <h3>' . $habitacion['numHabitacion'] . '</h3>
            <p>' . $habitacion['tipoHabitacion'] . '</p>
            <p> Precio por dia: $' . $habitacion['precioHabitacion'] . '</p>
          </div>
          <div class="icon">
            <i class="fas fa-bed"></i>
          </div>
          <a href="#" onclick="seleccionar(\'' . $habitacion['id'] . '\'); event.preventDefault();" class="small-box-footer">
          Disponible - Seleccionar <i class="fas fa-arrow-circle-right"></i>
        </a>
        </div>
      </div>';

        // Cerrar y abrir una nueva fila cada cuatro habitaciones
        if ($habitacion['id'] % 4 === 0) {
            echo '</div><div class="row">';
        }
    }

    // Cerrar la última fila
    echo '</div>';
}

function contarHabitacionesCreadas()
{
    require __DIR__ . '/../conexion.php';
    $result = $conn->query("SELECT COUNT(*) as total FROM Habitaciones");

    $totalHabitaciones = 0;

    if ($result) {
        $row = $result->fetch_assoc();
        $totalHabitaciones = $row['total'];
    }

    $conn->close();

}

function traerNumHabitacionesSelect()
{
    global $habitaciones;

    foreach ($habitaciones as $habitacion) {

        echo '<option value="' . $habitacion['id'] . '">' . $habitacion['numHabitacion'] . ' -> '.$habitacion['tipoHabitacion'].'</option>';


    }

}


function habitacionOcupada($habitacion, $fechaEntrada, $fechaSalida, $idCliente)
{
    require __DIR__ . '/../conexion.php';

    $entrada = date("Y-m-d", $fechaEntrada);
    $salida = date("Y-m-d", $fechaSalida);

    // Realizar la consulta para verificar si la habitación está ocupada en las fechas seleccionadas
    $sql = "SELECT COUNT(*) as count
    FROM Habitaciones_has_Reservas
    JOIN Habitaciones ON Habitaciones_has_Reservas.Habitaciones_idHabitacion = Habitaciones.idHabitacion
    JOIN Reservas ON Habitaciones_has_Reservas.Reservas_idReserva = Reservas.idReserva
    WHERE Habitaciones.idHabitacion = ? AND Reservas.fechaSalida > ? AND Reservas.fechaEntrada < ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $habitacion, $entrada, $salida);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $count = $row['count'];

    $stmt->close();
    $conn->close();


    if ($count > 0) {
        echo 'si está ocupada';
    } else {
        
        echo 'Puedes reservar';

    }
}


?>