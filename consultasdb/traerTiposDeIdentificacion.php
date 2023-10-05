<?php
require 'consultasdb/conexion.php';

$result = $conn->query("SELECT * FROM Tipo_Identificacion");

$tiposIdentificacion = array();

while ($row = $result->fetch_assoc()) {
    $tiposIdentificacion[] = array(
        'id' => $row['idTipo_Identificacion'],
        'nombre' => $row['nombreTipoId']
    );
}

$conn->close();


foreach ($tiposIdentificacion as $value) {
    echo '<option value="';
    echo $value['id'];
    echo '">';
    echo $value['nombre'];
    echo '</option>';
}
?>