<?php
// Inicia la sesión
session_start();

// Verifica si la sesión está activa
if (isset($_SESSION['nombreCompleto_usuario'])) {
    // La sesión está activa
   // echo "Sesión activa para el usuario: " . $_SESSION['nombreCompleto_usuario'];
} else {
    // La sesión no está activa
    echo "No hay sesión activa.";

    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Blank Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div>


    <!-- Content Wrapper. Contains page content -->
    <div>
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="row d-flex align-items-center">
          <div class="text-center;" style="margin-left: 1%;">
            <i class="nav-icon fas fas fa-sign-in-alt" style=" font-size: 2rem;"></i>
          </div>
          <h1 style="padding-left: 1%;">Verificación Entrada</h1>
        </div>
      </section>

      <!-- Main content -->
      <section class="content">

        <div class="container-fluid">

          <div class="row">

            <?php
            require '../consultasdb/verificacionentrada/verificacionentrada.php';
            traerHabitacionesocupadas();
            ?>

          </div>


        </div>


      </section>
      <!-- /.content -->

    </div>

  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>

  <script>
    function obtenerDetallesReserva(idReserva) {
      // Realiza la solicitud AJAX
      $.ajax({
        type: 'POST',
        url: '../consultasdb/verificacionentrada/obtener_detalles_reserva.php', // Ajusta el nombre de tu archivo PHP
        data: { idReserva: idReserva },
        success: function (response) {
          // Procesa la respuesta del servidor
          const detallesReserva = JSON.parse(response);

          // Muestra los detalles de la reserva en un SweetAlert
          Swal.fire({
            title: 'Detalles de la Reserva',
            html: `<p><strong>Identificacion usuario:</strong> ${detallesReserva.idUsuario}</p>
               <p><strong>Nombre del Cliente:</strong> ${detallesReserva.nombre} ${detallesReserva.apellido}</p>
               <p><strong>Correo electronico:</strong> ${detallesReserva.correoelectronico}</p>
               <p><strong>Telefono:</strong> ${detallesReserva.telefono}</p>
               <p><strong>Fecha de Entrada:</strong> ${detallesReserva.fechaEntrada}</p>
               <p><strong>Fecha de Salida:</strong> ${detallesReserva.fechasalida}</p>
               <p><strong>Total pago:</strong> $${detallesReserva.precioTotal}</p>`,
            icon: 'info',
            confirmButtonText: 'Aceptar'
          });
        },
        error: function (error) {
          // Maneja errores de la solicitud AJAX
          console.error('Error en la solicitud AJAX:', error);
        }
      });
    }
  </script>

</body>



</html>