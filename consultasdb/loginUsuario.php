<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $correoelectronico =  $_POST["Correo"];
  $password = $_POST["Contrasena"];

  require 'consultasdb/conexion.php';

  $sql = "SELECT * FROM Usuarios WHERE correoelectronico = ? LIMIT 1";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $correoelectronico);
  $stmt->execute();
  $result = $stmt->get_result();

  if($result->num_rows > 0){

  }
}

?>