<?php
$logeado="nada";
$datos = isset($_POST["Correo"]) && isset($_POST["Contrasena"]);
if ($datos) {
  $correoelectronico = $_POST["Correo"];
  $contrasena = $_POST["Contrasena"];

  require 'consultasdb/conexion.php';

  $sql = "SELECT * FROM Usuarios WHERE correoelectronico = ? LIMIT 1";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $correoelectronico);
  $stmt->execute();
  $result = $stmt->get_result();
  $stmt->close();
  $conn->close();
  if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();


    if (password_verify($contrasena, $user['contrasena'])) {

      echo "Login successful!";
    } else {

      $logeado = "usuarioocontrasenaincorrectos";
    }
  } else {
    $logeado = "noencontrado";

  }
}

?>