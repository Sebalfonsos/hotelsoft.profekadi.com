<?php
require 'consultasdb/registro.php';
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
          <div class="input-group mb-3">
            <select required class="form-control" name="TipoIdentificacion" id="">
              <option selected disabled value="">Tipo de Identificación</option>
              <?php
              include 'consultasdb/traerTiposDeIdentificacion.php';
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