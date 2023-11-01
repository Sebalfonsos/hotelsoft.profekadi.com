<?php

require __DIR__.'/../conexion.php';
$result = $conn->query("SELECT * FROM Roles WHERE idRol != 1");
$resultPermisos = $conn->query("SELECT R.idRol, R.nombreRol, SW.idseccionWEB, SW.nombreSeccion,
CASE WHEN RHS.Roles_idRol IS NOT NULL THEN 1 ELSE 0 END AS tieneAcceso
FROM Roles AS R
CROSS JOIN seccionesWEB AS SW
LEFT JOIN Roles_has_seccionesWEB AS RHS
ON R.idRol = RHS.Roles_idRol AND SW.idseccionWEB = RHS.seccionesWEB_idseccionWEB
WHERE R.idRol != 1 AND SW.estado = 1
ORDER BY R.idRol, SW.idseccionWEB;");

$conn->close();
$roles = array();


while ($row = $result->fetch_assoc()) {
    $roles[] = array(
        'idRol' => $row['idRol'],
        'nombreRol' => $row['nombreRol']
    );
}

while ($row = $resultPermisos->fetch_assoc()) {
    $permisos[] = array(
        'idRol' => $row['idRol'],
        'idseccionWEB' => $row['idseccionWEB'],
        'nombreSeccion' => $row['nombreSeccion'],
        'tieneAcceso' => $row['tieneAcceso']
    );
}


function traerRoles()
{

    global $roles;



    foreach ($roles as $rol) {
        echo '<a class="list-group-item list-group-item-action" data-toggle="list" href="#' . $rol['nombreRol'] . '"
        role="tab" identificadorRol="' . $rol['idRol'] . '">' . $rol['nombreRol'] . '</a>';
    }


}

function traerPermisos()
{
    global $roles;
    global $permisos;


    foreach ($roles as $rol) {
        echo '<div class="tab-pane" id="' . $rol['nombreRol'] . '" role="tabpanel">';
        echo '<ul class="list-group">';
        foreach ($permisos as $permiso) {
            if ($rol['idRol'] == $permiso['idRol']) {

                if ($permiso['tieneAcceso'] == 1) {
                    $tieneAcceso = "checked";
                } else {
                    $tieneAcceso = "";
                }
                echo '<li class="list-group-item">
                        ' . $permiso['nombreSeccion'] . '
                        <div class=" float-right">
                            <input pertenece="' . $rol['idRol'] . '" id="' . $permiso['idseccionWEB'] . '" type="checkbox" ' . $tieneAcceso . '>
                            
                        </div>
                    </li>';
            }

        }

        echo '</ul>';
        echo '</div>';

    }

}

function traerRolesEnFormatoSelect()
{


    global $roles;


    foreach ($roles as $rol) {
        if ($rol['idRol'] != 2) {
            echo '<option value="';
            echo $rol['idRol'];
            echo '">';
            echo $rol['nombreRol'];
            echo '</option>';
        }

    }

}
?>