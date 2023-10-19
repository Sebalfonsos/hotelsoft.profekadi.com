<?php
function mostrarMenus()
{
    session_start();

    if (isset($_SESSION['id_usuario'])) {
        $seccionesAMostrar = traerSeccionesPorRol($_SESSION['id_rol']);

        foreach ($seccionesAMostrar as $seccion) {



            if ($seccion['estado'] === 1 and $seccion['desplegable'] === 0 and $seccion['seccionesWEB_idseccionWEB'] === NULL) {

                echo '<li class="nav-item">
                      <a href="menus/' . $seccion['direccion'] . '" class="nav-link">
                          <i class="nav-icon ' . $seccion['icono'] . '"></i>
                          <p>
                              ' . $seccion['nombre'] . '
                          </p>
                     </a>
                  </li>';
            } else if ($seccion['estado'] === 1 and $seccion['desplegable'] === 1 and $seccion['seccionesWEB_idseccionWEB'] === NULL) {
                echo '<li class="nav-item">
                <a href="menus/' . $seccion['direccion'] . '" class="nav-link">
                <i class="nav-icon ' . $seccion['icono'] . '"></i>
                <p>
                ' . $seccion['nombre'] . '
                  <i class="right fas fa-angle-left"></i>
                </p>
                </a>';
                echo '<ul class="nav nav-treeview">';
                foreach ($seccionesAMostrar as $seccion2) {

                    if($seccion2['seccionesWEB_idseccionWEB'] == $seccion['id']){
                        echo '
                        <li class="nav-item">
                        <a href="menus/'.$seccion2['direccion'].'" class="nav-link">
                            <i class="'.$seccion2['icono'].' nav-icon"></i>
                            <p>' . $seccion2['nombre'] . '</p>
                         </a>
                         </li>
                        ';
                    }
                    
                }

                echo '</ul>';
                echo '</li>';
            }

        }
    }


}

function traerSeccionesPorRol($rolid)
{
    require 'consultasdb/conexion.php';
    $sql = "SELECT sw.*
    FROM Roles_has_seccionesWEB rhs
    JOIN seccionesWEB sw ON rhs.seccionesWEB_idseccionWEB = sw.idseccionWEB
    WHERE rhs.Roles_idRol = ?"; 

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $rolid);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $conn->close();

    $secciones = array();

    while ($row = $result->fetch_assoc()) {
        $secciones[] = array(
            'id' => $row['idseccionWEB'],
            'nombre' => $row['nombreSeccion'],
            'direccion' => $row['direccionSeccion'],
            'icono' => $row['icono'],
            'desplegable' => $row['desplegable'],
            'estado' => $row['estado'],
            'seccionesWEB_idseccionWEB' => $row['seccionesWEB_idseccionWEB'],

        );


    }



    return $secciones;
}
?>