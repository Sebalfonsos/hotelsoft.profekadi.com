<?php
include "../consultasdb/inicio/consultasInicio.php"
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Inicio</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    <div>

      <section class="content-header">

        <div class="row d-flex align-items-center">
          <div class="text-center;" style="margin-left: 1%;">
            <i class="nav-icon fas fa-home" style=" font-size: 2rem;"></i>
          </div>
          <h1 style="padding-left: 1%;">Principal</h1>
        </div>

      </section>

      <!-- Main content -->
      <section class="content">

        <div class="container-fluid">

          <!-- =========================================================== -->

          <!-- Small Box (Stat card) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-info">
                <div class="inner">
                  <p>Total Habitaciones</p>
                  <h3>
                    <?php echo totalHabitaciones(); ?>
                  </h3>
                </div>
                <div class="icon">
                  <i class="fas fa-bed"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-success">
                <div class="inner">
                  <p>Habitaciones Libres</p>
                  <h3>
                    <?php echo totalHabitacionesLibres(); ?>
                  </h3>
                </div>
                <div class="icon">
                  <i class="fas fa-bed"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <p>Habitaciones Ocupadas</p>
                  <h3>
                    <?php echo totalHabitacionesOcupadas(); ?>
                  </h3>
                </div>
                <div class="icon">
                  <i class="fas fa-bed"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <p>Habitaciones Deshabilitadas</p>
                  <h3>
                    <?php echo totalHabitacionesDesocupadas(); ?>
                  </h3>
                </div>
                <div class="icon">
                  <i class="fas fa-bed"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->
        </div>
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <div class="card card-outline card-success">
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="far fa-chart-bar"></i>
                      ESTADISTICAS
                    </h3>

                  </div>
                  <!-- /.card-header -->
                  <title>Gráfico de Barras</title>
                  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                  <div style="width: 80%; margin: 0 auto;">
                    <canvas id="barChart"></canvas>
                  </div>

                  <script>
                    // Datos de ejemplo para las habitaciones ocupadas por mes
                    const data = {
                      labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                      datasets: [{
                        label: 'Habitaciones Ocupadas',
                        data: <?php ocupacionHabitaciones() ?>,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                      }]
                    };

                    const ctx = document.getElementById('barChart').getContext('2d');

                    new Chart(ctx, {
                      type: 'bar',
                      data: data,
                      options: {
                        scales: {
                          y: {
                            beginAtZero: true
                          }
                        }
                      }
                    });
                  </script>
                  <!-- /.card-body -->
                </div>
              </div>
              <div class="col-md-6">
                <div class="card card-success shadow-sm">
                  <div class="card-header">
                    <h3 class="card-title">LISTA DE HABITACIONES OCUPADAS</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                    <!-- /.card-tools -->
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body" style="">
                    <table id="tabla1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>N° Habitacion</th>
                          <th>Nombres</th>
                          <th>Apellidos</th>
                          <th>Telefono</th>
                          <th>Fecha entrada</th>
                          <th>Fecha salida</th>
                          <th>Precio total</th>
                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                      <tfoot>
                        <tr>
                          <th>N° Habitacion</th>
                          <th>Nombres</th>
                          <th>Apellidos</th>
                          <th>Telefono</th>
                          <th>Fecha entrada</th>
                          <th>Fecha salida</th>
                          <th>Precio total</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>

                </div>
                <!-- /.card -->
              </div>


            </div>
        </section>
    </div>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  </section>
  <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>

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
  <script src="../plugins/datatables/es-ES.js"></script>

  <script>
    var dataHab = <?php echo listaHabitacionesOcupadas(); ?>;
    $(function () {
      $("#tabla1").DataTable({
        language: spanish,
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["excel", "pdf", "print", "colvis"],
        columns: [
          { title: 'N° Habitacion' },
          { title: 'Nombres' },
          { title: 'Apellidos' },
          { title: 'Telefono' },
          { title: 'Fecha entrada' },
          { title: 'Fecha salida' },
          { title: 'Precio total' }
        ],
        data: dataHab

      }).buttons().container().appendTo('#tabla1_wrapper .col-md-6:eq(0)');

    });
  </script>
</body>

</html>