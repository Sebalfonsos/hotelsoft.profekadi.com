<?php
function loginExitoso($id, $nombre, $apellido, $idrol, $rol){
    session_start();
    $_SESSION['id_usuario'] = $id;
    $_SESSION['nombreCompleto_usuario'] = $nombre . " " . $apellido;
    $_SESSION['id_rol'] = $idrol;
    $_SESSION['rol_usuario'] = $rol;
  
  
  
  }
?>