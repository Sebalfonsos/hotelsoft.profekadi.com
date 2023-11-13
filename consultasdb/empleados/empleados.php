<?php
function traerDatosEmpleados()
{
    require __DIR__ . '/../conexion.php';

    $sql = "SELECT Usuarios.idUsuario, Usuarios.nombre, Usuarios.apellido, Usuarios.correoelectronico, Usuarios.telefono, Usuarios.estado, Tipo_Identificacion.nombreTipoId AS Tipo_Identificacion, Roles.nombreRol, estados.nombreEstado
    FROM Usuarios
    JOIN Tipo_Identificacion ON Usuarios.TipoIdentificacion_idTipoIdentificacion = Tipo_Identificacion.idTipo_Identificacion
    JOIN Roles ON Usuarios.Roles_idRoles = Roles.idRol
    JOIN estados ON Usuarios.estado = estados.idEstado
    WHERE Usuarios.Roles_idRoles != 1 AND Usuarios.Roles_idRoles != 2;";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $conn->close();
    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = array(
                $row["idUsuario"],
                $row["Tipo_Identificacion"],
                $row["nombre"],
                $row["apellido"],
                $row["correoelectronico"],
                $row["telefono"],
                $row["nombreRol"],
                $row["nombreEstado"],
                ''
            );
        }
    }

    return json_encode($data);
}
?>