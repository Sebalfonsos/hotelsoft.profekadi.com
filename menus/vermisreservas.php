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

<?php

include '../consultasdb/roles/consultarRolesYPermisos.php';




?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HotelSoft | Lista Reservas</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="hold-transition sidebar-mini">

  <div class="">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row d-flex align-items-center">
        <div class="text-center;" style="margin-left: 1%;">
          <i class="nav-icon far fa-calendar-alt" style=" font-size: 2rem;"></i>
        </div>
        <h1 style="padding-left: 1%;">Mis Reservas</h1>
      </div>

    </section>




    <div class="container-fluid">

      <!-- =========================================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="">


          <!-- Default box -->
          <div class="card">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title"> Listado de Reservas </h3>
              </div>
            </div>
            <div class="card-body ">
              <div class="row mb-2">
                <div class="col-sm-6">

                  <div class="modal fade" id="crearHabitacionModal" tabindex="-1" role="dialog"
                    aria-labelledby="crearHabitacionModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="crearHabitacionModalLabel">Crear Empleado</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form id="formularioCrearEmpleado">
                            <div class="form-group">
                              <label for="">Documento</label>
                              <input type="text" name="documento" class="form-control" id=" "
                                placeholder="Ej. 100288790">
                            </div>
                            <div class="form-group">
                              <label for="">Tipo Documento</label>
                              <select required class="form-control" name="tipoDocumento" id="">
                                <option selected disabled value="">Tipo de Identificación</option>

                              </select>
                            </div>
                            <div class="form-group">
                              <label for="">Nombres</label>
                              <input name="nombre" type="text" class="form-control" id="nombres"
                                placeholder="Ej. Carlos">
                            </div>
                            <div class="form-group">
                              <label for="">Apellidos</label>
                              <input name="apellido" type="text" class="form-control" id="apellidos"
                                placeholder="Ej. Fonseca">
                            </div>
                            <div class="form-group">
                              <label for="">Correo Electronico</label>
                              <input name="correoElectronico" type="text" class="form-control" id="correoElectronico"
                                placeholder="Ej. hotelsoft@hotmail.com">
                            </div>
                            <div class="form-group">
                              <label for="">Contraseña</label>
                              <input type="password" name="contrasena" class="form-control" id="contrasena"
                                placeholder="Ej. 100288790">
                            </div>
                            <div class="form-group">
                              <label for="">Telefono</label>
                              <input name="telefono" type="text" class="form-control" id="telefono"
                                placeholder="Ej. $3005186039">
                            </div>
                            <div class="form-group">
                              <label for="">Rol</label>
                              <select name="rol" class="form-control" id="rol">

                              </select>
                            </div>



                        </div>


                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <table id="tabla1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID Reserva</th>
                    <th>Numero Habitación</th>
                    <th>Tipo Habitación</th>
                    <th>Fecha entrada</th>
                    <th>Fecha salida</th>
                    <th>Precio total</th>
                    <th>Estado reserva</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                  <tr>
                    <th>ID Reserva</th>
                    <th>Numero Habitación</th>
                    <th>Tipo Habitación</th>
                    <th>Fecha entrada</th>
                    <th>Fecha salida</th>
                    <th>Precio total</th>
                    <th>Estado reserva</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </section>
        <!-- /.content -->
      </div>
    </div>
    <!-- ./wrapper -->






    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../../plugins/jszip/jszip.min.js"></script>
    <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <script src="../plugins/datatables/es-ES.js"></script>

    <!-- Page specific script -->
    <script>
      var data = <?php require '../consultasdb/vermisreservas/vermisreservas.php';
      echo traerDatosReserva(); ?>;
      $(function () {
        $("#tabla1").DataTable({
          language: spanish,
          "responsive": true,
          "lengthChange": false,
          "autoWidth": false,
          "buttons": ["excel", "pdf", "print", "colvis"],
          columns: [
            { title: 'ID Reserva' },
            { title: 'Numero Habitación' },
            { title: 'Tipo Habitación' },
            { title: 'Fecha entrada' },
            { title: 'Fecha salida' },
            { title: 'Precio total' },
            { title: 'Estado reserva' }
          ],
          data: data

        }).buttons().container().appendTo('#tabla1_wrapper .col-md-6:eq(0)');

      });



    </script>
  </div>
</body>

</html>