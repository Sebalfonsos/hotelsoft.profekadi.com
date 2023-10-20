<?php
$logeado = "nada";
$datos = isset($_POST["Correo"]) && isset($_POST["Contrasena"]);
if ($datos) {
  $correoelectronico = $_POST["Correo"];
  $contrasena = $_POST["Contrasena"];

  require 'consultasdb/conexion.php';

  $sql = "SELECT Usuarios.*, Roles.nombreRol AS nombre_rol FROM Usuarios JOIN Roles ON Usuarios.Roles_idRoles = Roles.idRol WHERE correoelectronico = ? LIMIT 1";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $correoelectronico);
  $stmt->execute();
  $result = $stmt->get_result();
  $stmt->close();
  $conn->close();
  if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    if($user['estado'] == 1){

      if (password_verify($contrasena, $user['contrasena'])) {
      
        require 'sesion/login.php';
        loginExitoso($user['idUsuario'], $user['nombre'], $user['apellido'], $user['Roles_idRoles'], $user['nombre_rol']);
  
        header('location: /panel.php');
        exit();
      } else {
  
        $logeado = "usuarioocontrasenaincorrectos";
      }

    }else{
      $logeado = "usuarioInactivo";
    }

  } else {
    $logeado = "usuarioocontrasenaincorrectos";
  }
}





?>