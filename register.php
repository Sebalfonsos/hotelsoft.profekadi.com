<?php
$avisoIdentificación = "";
$avisoCorreo = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombres = $_POST["Nombres"];
  $apellidos = $_POST["Apellidos"];
  $tipoIdentificacion = $_POST["TipoIdentificacion"];
  $identificacion = $_POST["Identificacion"];
  $telefono = $_POST["Telefono"];
  $correoelectronico = $_POST["Correo"];
  $contrasenahash = password_hash($_POST["Contrasena"], PASSWORD_DEFAULT);
  require 'conexion.php';
  // Verificar si el correo o la identificación ya existen en la base de datos
  $sql = "SELECT * FROM Usuarios WHERE correoelectronico = ? OR idUsuario = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $correo, $identificacion);
  $stmt->execute();

  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    if ($row['idUsuario'] == $identificacion) {
      $avisoIdentificación = "El número de identificación ya está registrado.";

    } elseif ($row['correoelectronico'] == $correo) {
      $avisoCorreo = "El correo ya está registrado. Por favor, use otro correo.";
    }


  } else {
    // Insertar el nuevo usuario en la base de datos
    $insertQuery = "INSERT INTO `Usuarios` (`idUsuario`, `contrasena`, `nombre`, `apellido`, `correoelectronico`, `telefono`, `TipoIdentificacion_idTipo Identificacion`) VALUES (?, ?, ?, ?, ?, ?, ?)";  
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("ssssssi", $identificacion, $contrasenahash, $nombres, $apellidos, $correoelectronico, $telefono, $tipoIdentificacion);
    if ($stmt->execute()) {
      echo "Registro exitoso.";
  } else {
      echo "Error al registrar el usuario: " . $stmt->error;
  }
  
  }
  $stmt->close();
  $conn->close();
  
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registro</title>
  <link rel="icon" type="image/x-icon" href="assets/newfavicon.ico" />
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="estilospersonalizados/login.css">

</head>

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="login.php" class="h1"><b>Hotel</b>SOFT</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Registro de Nuevo Miembro</p>

        <form action="register.php" method="POST">
          <div class="input-group mb-3">
            <input required type="text" class="form-control" placeholder="Nombres" name="Nombres">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input required type="text" class="form-control" placeholder="Apellidos" name="Apellidos">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>

          <?php
          require 'conexion.php';

          $result = $conn->query("SELECT * FROM Tipo_Identificacion");

          $tiposIdentificacion = array();

          while ($row = $result->fetch_assoc()) {
            $tiposIdentificacion[] = array(
              'id' => $row['idTipo_Identificacion'],
              'nombre' => $row['nombreTipoId']
            );
          }

          $conn->close();
          ?>


          <div class="input-group mb-3">
            <select required class="form-control" name="TipoIdentificacion" id="">
              <option selected disabled value="">Tipo de Identificación</option>
              <?php
              foreach ($tiposIdentificacion as $value) {
                echo '<option value="'; echo $value['id']; echo '">';
                echo $value['nombre'];
                echo '</option>';
              }
              ?>
            </select>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-id-badge"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input required type="text" class="form-control" placeholder="Identificación" name="Identificacion">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>

            <?php
            echo $avisoIdentificación;
            ?>
          </div>


          <div class="input-group mb-3">
            <input required type="tel" class="form-control" placeholder="Telefono" name="Telefono">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-phone"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input required type="email" class="form-control" placeholder="Correo" name="Correo">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            <?php
            echo $avisoCorreo;
            ?>
          </div>
          <div class="input-group mb-3">
            <input required type="password" class="form-control" placeholder="Contraseña" name="Contrasena">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>



          <button type="submit" class="btn btn-primary btn-block">Registrate</button>

          <!-- /.form-box -->
      </div><!-- /.card -->

    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>