<?php
require '../conexion.php';
$idRol = $_POST['idRol'];
$permisos = $_POST['permisos'];

// Procesar los datos para añadir o eliminar registros en la base de datos
foreach ($permisos as $permiso) {
    $idSeccion = $permiso['id'];
    $estadoActual = $permiso['estadoActual'];

    if ($estadoActual == 1) {
        // Añadir registro
        $sql = "INSERT INTO Roles_has_seccionesWEB (Roles_idRol, seccionesWEB_idseccionWEB) VALUES ('$idRol', '$idSeccion')";
    } else {
        // Eliminar registro
        $sql = "DELETE FROM Roles_has_seccionesWEB WHERE Roles_idRol = '$idRol' AND seccionesWEB_idseccionWEB = '$idSeccion'";
    }

    if ($conn->query($sql) !== TRUE) {
        echo "error";
        exit; // Terminar la ejecución si hay un error en la consulta SQL
    }
}

// Cerrar la conexión a la base de datos
$conn->close();

// Respuesta exitosa
echo "exito";
?>