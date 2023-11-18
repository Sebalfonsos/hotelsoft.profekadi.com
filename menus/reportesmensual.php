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
    <title>AdminLTE 3 | DataTables</title>

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
    <link rel="stylesheet" href="../estilospersonalizados/reportes.css">
</head>

<body class="hold-transition sidebar-mini">

    <!-- Content Wrapper. Contains page content -->
    <div>

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="row d-flex align-items-center">
                <div class="text-center;" style="margin-left: 1%;">
                    <i class="nav-icon fas fa-file" style=" font-size: 2rem;"></i>
                </div>
                <h1 style="padding-left: 1%;">Reporte Mensual</h1>
            </div>
        </section>
        <div class="container mt-2">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group custom-select-wrapper">
                        <label for="yearSelect">Año:</label>
                        <select id="yearSelect" class="form-control form-control-sm bordecitoverde">
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <!-- Agrega más años aquí -->
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group custom-select-wrapper">
                        <label for="monthSelect">Mes:</label>
                        <select id="monthSelect" class="form-control form-control-sm bordecitoverde">
                            <option value="1">Enero</option>
                            <option value="2">Febrero</option>
                            <!-- Agrega más meses aquí -->
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group custom-select-wrapper">
                        <label for="responsibleSelect">Responsable:</label>
                        <select id="responsibleSelect" class="form-control form-control-sm bordecitoverde">
                            <option value="john">John Doe</option>
                            <option value="jane">Jane Smith</option>
                            <!-- Agrega más responsables aquí -->
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
                                        href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Tabla
                                        alquiler</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab"
                                        href="#nav-profile" role="tab" aria-controls="nav-profile"
                                        aria-selected="false">Tabla servicio a la habitación y venta
                                        directa</a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                    aria-labelledby="nav-home-tab">

                                    <div class="container" style="margin-top: 2%;">
                                        <div class="row">
                                            <div class="col order-last" style="text-align: center;">
                                                <label for="">COP:</label> <br>
                                                <p>TOTAL</p>
                                            </div>
                                            <div class="col" style="text-align: center;">
                                                <label for="">COP:</label>
                                                <p>TOTAL RESERVACIÓN</p>
                                            </div>
                                            <div class="col order-first" style="text-align: center;">
                                                <label for="">COP:</label>
                                                <p>TOTAL RECEPCIÓN</p>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="tabla1" class="table table-bordered table-striped">
                                            <thead>
                                                <th>N°</th>
                                                <th>Documento</th>
                                                <th>Tipo </th>
                                                <th>Habitación</th>
                                                <th>Descuento</th>
                                                <th>Extras</th>
                                                <th>Dinero Adelantado</th>
                                                <th>Servicios</th>
                                                <th>Penalidad</th>
                                                <th>Total</th>
                                                <th>Tiempo Rebasado</th>
                                                <th>Detalles</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>N°</th>
                                                    <th>Documento</th>
                                                    <th>Tipo </th>
                                                    <th>Habitación</th>
                                                    <th>Descuento</th>
                                                    <th>Extras</th>
                                                    <th>Dinero Adelantado</th>
                                                    <th>Servicios</th>
                                                    <th>Penalidad</th>
                                                    <th>Total</th>
                                                    <th>Tiempo Rebasado</th>
                                                    <th>Detalles</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                    aria-labelledby="nav-profile-tab">
                                    <div class="container" style="margin-top: 2%;">
                                        <div class="row">
                                            <div class="col order-last" style="text-align: center;">
                                                <label for="">COP:</label> <br>
                                                <p>TOTAL</p>
                                            </div>
                                            <div class="col" style="text-align: center;">
                                                <label for="">COP:</label>
                                                <p>TOTAL RESERVACIÓN</p>
                                            </div>
                                            <div class="col order-first" style="text-align: center;">
                                                <label for="">COP:</label>
                                                <p>TOTAL RECEPCIÓN</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table id="tabla2" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>N°</th>
                                                    <th>Documento</th>
                                                    <th>Tipo </th>
                                                    <th>Habitación</th>
                                                    <th>Articulo</th>
                                                    <th>Cantidad</th>
                                                    <th>Precio Unitario</th>
                                                    <th>Total</th>
                                                    <th>Hora Venta</th>
                                                    <th>Responsable</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>N°</th>
                                                    <th>Documento</th>
                                                    <th>Tipo </th>
                                                    <th>Habitación</th>
                                                    <th>Articulo</th>
                                                    <th>Cantidad</th>
                                                    <th>Precio Unitario</th>
                                                    <th>Total</th>
                                                    <th>Hora Venta</th>
                                                    <th>Responsable</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->

                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
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

    <!-- Page specific script -->
    <script src="../plugins/datatables/es-ES.js"></script>
    <script>

        $(function () {
            $("#tabla1").DataTable({
                language: spanish,
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["excel", "pdf", "print", "colvis"],
            }).buttons().container().appendTo('#tabla1_wrapper .col-md-6:eq(0)');


            $("#tabla2").DataTable({
                language: spanish,
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#tabla2_wrapper .col-md-6:eq(0)');


        });
    </script>
</body>

</html>