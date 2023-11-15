<?php

function traerHabitacionesOcupadas()
{
    require __DIR__.'/../conexion.php';
    $result = $conn->query("SELECT Reservas.*, Habitaciones.*
    FROM Reservas 
    JOIN Habitaciones_has_Reservas 
    ON Reservas.idReserva = Habitaciones_has_Reservas.Reservas_idReserva
    JOIN Habitaciones
    ON Habitaciones.idHabitacion = Habitaciones_has_Reservas.Habitaciones_idHabitacion
    WHERE DATE(fechaEntrada) = CURDATE();");

    $habitaciones = array();

    while ($row = $result->fetch_assoc()) {
        $habitaciones[] = array(
            'id' => $row['idHabitacion'],
            'numHabitacion' => $row['numHabitacion'],
            'tipoHabitacion' => $row['tipoHabitacion'],
            'estado' => $row['estado'],
            'precioHabitacion' => $row['precioHabitacion'],
            'idReserva' => $row['idReserva']
        );
    }
    $conn->close();




    foreach ($habitaciones as $habitacion) {
        echo '<div class="col-lg-3 col-6">
        <div class="small-box bg-success">
          <div class="inner">
            <h3>' . $habitacion['numHabitacion'] . '</h3>
            <p>' . $habitacion['tipoHabitacion'] . '</p>
          </div>
          <div class="icon">
            <i class="fas fa-bed"></i>
          </div>
          <a href="#" onclick="obtenerDetallesReserva(\'' . $habitacion['idReserva'] . '\');" event.preventDefault(); class="small-box-footer">
          Más info <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>';

    }

}




?>