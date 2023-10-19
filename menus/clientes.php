<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HotelSoft | Lista Usuarios</title>

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

  <div class="">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row d-flex align-items-center">
        <div class="text-center;" style="margin-left: 1%;">
          <i class="nav-icon fas fa-users" style=" font-size: 2rem;"></i>
        </div>
        <h1 style="padding-left: 1%;">Usuarios</h1>
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
                    <th>Documento</th>
                    <th>Tipo Documento</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Correo Electronico</th>
                    <th>Telefono</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                  <tr>
                    <th>Documento</th>
                    <th>Tipo Documento</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Correo Electronico</th>
                    <th>Telefono</th>
                    <th>Rol</th>
                    <th>Acciones</th>
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
      var data = <?php require '../consultasdb/clientes.php'; echo traerDatosClientes(); ?>;
      $(function () {
        $("#tabla1").DataTable({
          language: spanish,
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": ["excel", "pdf", "print", "colvis"],
          columns: [
            { title: 'Documento' },
            { title: 'Tipo Documento' },
            { title: 'Nombres' },
            { title: 'Apellidos' },
            { title: 'Correo Electronico' },
            { title: 'Telefono' },
            { title: 'Rol' },
            {
              title: 'Acciones',
              searchable: false,
              orderable: false,
              render: function (data, type, row) {
                return '<button class="btn btn-sm" onclick="editarUsuario(' + row[0] + ')"><i class="fas fa-edit"></i> Editar</button>' +
                '<button class="btn btn-sm reset" onclick="resetearContrasena(' + row[0] + ')"><i class="fas fa-key"></i> Cambiar Contraseña</button>' +
                  '<button class="btn btn-sm" onclick="eliminarUsuario(' + row[0] + ')"><i class="fas fa-trash"></i> Eliminar</button>';
              }

            }
          ],
          data: data

        }).buttons().container().appendTo('#tabla1_wrapper .col-md-6:eq(0)');

      });



      function editarUsuario(documento) {
        // Implementa la lógica para editar el usuario con el documento proporcionado
        console.log('Editar usuario con documento:', documento);
      }

      function resetearContrasena(documento) {
        // Implementa la lógica para editar el usuario con el documento proporcionado
        console.log('Cambiar contraseña usuario con documento:', documento);
      }

      function eliminarUsuario(documento) {
        // Implementa la lógica para eliminar el usuario con el documento proporcionado
        console.log('Eliminar usuario con documento:', documento);
      }

    </script>
  </div>
</body>

</html>