<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inicio| Blank Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
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
                  <h3>150</h3>
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
                  <h3>53</h3>
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
                  <h3>44</h3>
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
                  <p>Habitaciones Reservadas Hoy</p>
                  <h3>65</h3>
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
                data: [10, 15, 12, 20, 18, 25, 30, 28, 24, 22, 19, 16],
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
                  <div class="card-body" style="display: block;">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>N°</th>
                          <th>Cliente</th>
                          <th>Habitación</th>
                          <th>Tarifa/Tipo</th>
                          <th>Fecha Ingreso</th>
                        </tr>
                      </thead>
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


</body>

</html>