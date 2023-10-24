<?php

function ponerColor($estado) {
    switch ($estado) {
        case 'Disponible':
            return 'bg-success';
            break;
        case 'Ocupada':
            return 'bg-danger';
            break;
        case 'Mantenimiento':
            return 'bg-info'; 
            break;
        default:
            return ''; 
            break;
    }
}

function traerHabitaciones() {
    require 'conexion.php';
    $result = $conn->query("SELECT * FROM Habitaciones");

    $habitaciones = array();

    while ($row = $result->fetch_assoc()) {
        $claseColor = ponerColor($row['estado']); // Obtener la clase CSS
        $habitaciones[] = array(
            'id' => $row['idHabitacion'],
            'numHabitacion' => $row['numHabitacion'],
            'tipoHabitacion' => $row['tipoHabitacion'],
            'estado' => $row['estado'],
            'precioHabitacion' => $row['precioHabitacion'],
            'claseColor' => $claseColor // Agregar la clase CSS al arreglo
        );
    }
    $conn->close();

    foreach ($habitaciones as $habitacion) {
        echo '<div class="col-lg-3 col-6">
        <div class="small-box ' . $habitacion['claseColor'] . '">
          <div class="inner">
            <h3>' . $habitacion['numHabitacion'] . '</h3>
            <p>' . $habitacion['tipoHabitacion'] . '</p>
          </div>
          <div class="icon">
            <i class="fas fa-bed"></i>
          </div>
          <a href="#" class="small-box-footer">
          ' . $habitacion['estado'] . ' <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>';
    }
}

?>
