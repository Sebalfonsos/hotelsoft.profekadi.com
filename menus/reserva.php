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
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Calendar</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="../plugins/fullcalendar/main.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    <div class="">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="row d-flex align-items-center">
          <div class="text-center;" style="margin-left: 1%;">
            <i class="nav-icon fas fa-calendar-alt" style=" font-size: 2rem;"></i>
          </div>
          <h1 style="padding-left: 1%;">Calendario</h1>
        </div>

    </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div id="external-events"></div>
      </div>
      <div class="container d-flex justify-content-center align-items-center">
      <p class="text-center">--Da clic sobre una reserva para obtener más información--</p>
      </div>
      <div class="card card-primary">
        <div class="ml-3 mr-3 card-body p-0">
          <div id="calendar"></div>
        </div>
      </div>
  </div>
  </div>
  </section>
  </div>

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- jQuery UI -->
  <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.min.js"></script>
  <!-- fullCalendar 2.2.5 -->
  <script src="../plugins/moment/moment.min.js"></script>
  <script src="../plugins/fullcalendar/main.js"></script>

  <!-- Page specific script -->

  <script src="../plugins/fullcalendar/locales/es.js"></script>
  <script>
    $(function () {
      function ini_events(ele) {
        ele.each(function () {
          var eventObject = {
            title: $.trim($(this).text())
          }
          $(this).data('eventObject', eventObject)
        })
      }

      ini_events($('#external-events div.external-event'))

      var Calendar = FullCalendar.Calendar;

      <?php require '../consultasdb/calendario/traerReservas.php' ?>
      var containerEl = document.getElementById('external-events');
      var checkbox = document.getElementById('drop-remove');
      var calendarEl = document.getElementById('calendar');

      var calendar = new Calendar(calendarEl, {
        locale: 'es',
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay,list'
        },
        themeSystem: 'bootstrap',
        events: eventos,
        editable: false,
        droppable: false,
        eventClick: function (info) {
          // Aquí puedes ejecutar la acción que desees al hacer clic en un evento.
          // 'info' contiene información sobre el evento clickeado.
          //alert('Evento clickeado: ' + info.event.extendedProps.nombreUsuario);

          Swal.fire({
            title: "Reserva de: " + info.event.extendedProps.nombreUsuario + " " + info.event.extendedProps.apellidoUsuario,
            html: '<p class="mb-0"><strong>Documento: </strong> ' + info.event.extendedProps.idUsuario + '</p><p class="mb-0"><strong>Habitacion #</strong> ' + info.event.extendedProps.habitacionNumero + '</p> <p class="mb-0"><strong>Tipo habitación: </strong> ' + info.event.extendedProps.tipoHabitacion + '</p> <p class="mb-0"><strong>Fecha entrada:</strong> ' + info.event.extendedProps.fechaEntrada + '</p> <p class="mb-0"><strong>Fecha salida:</strong> ' + info.event.extendedProps.fechaSalida + '</p> <p class="mb-0"><strong>Precio total: </strong>$' + info.event.extendedProps.precioTotal + '</p>',
            icon: 'info',

          });
        },
      });

      calendar.render();
    })
  </script>

</body>

</html>