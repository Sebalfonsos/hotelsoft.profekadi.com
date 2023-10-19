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
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section>
        <div class="row d-flex align-items-center">
          <div class="text-center;" style="margin-left: 1%;">
            <i class="nav-icon fas fa-bed" style=" font-size: 2rem;"></i>
          </div>
          <h1 style="padding-left: 1%;">Habitaciones</h1>
        </div>
      </section>
      <section class="content">

        <div class="container-fluid " >
          <div class="content-wrapper">
 
            <section class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                </div>
              </div>
            </section>

            <!-- Main content -->
            <section class="content">
              <div class="card">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title"> Listado de Usuarios </h3>
                  </div>
                </div>
                <div class="card-body ">
                  <div class="row mb-2">
                    <div class="col-sm-6">
                      <button type="submit" class="btn btn-primary">Agregar Nuevo</button>
                    </div>
                  </div>
                  <table id="tabla1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>N° Habitación</th>
                        <th>Categoria</th>
                        <th>Precio</th>
                        <th>Tarifa</th>
                        <th>Detalles</th>
                        <th>Estatus</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                      <tr>
                        <th>N° Habitación</th>
                        <th>Categoria</th>
                        <th>Precio</th>
                        <th>Tarifa</th>
                        <th>Detalles</th>
                        <th>Estatus</th>
                        <th>Acciones</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </section>
          </div>

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
            $(function () {
              $("#tabla1").DataTable({
                language: spanish,
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["excel", "pdf", "print", "colvis"]
              }).buttons().container().appendTo('#tabla1_wrapper .col-md-6:eq(0)');

            });
          </script>
      </section>
</body>

</html>