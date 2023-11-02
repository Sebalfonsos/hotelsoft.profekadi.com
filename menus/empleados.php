<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HotelSoft | Lista Empleados</title>

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
          <i class="nav-icon fas fa-users" style=" font-size: 2rem;"></i>
        </div>
        <h1 style="padding-left: 1%;">Empleados</h1>
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
                <h3 class="card-title"> Listado de Empleados </h3>
              </div>
            </div>
            <div class="card-body ">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crearHabitacionModal">
                    Crear Empleado
                  </button>
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
                                <?php
                                include '../consultasdb/traerTiposDeIdentificacion.php';

                                ?>
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
                                <?php
                                include '../consultasdb/roles/consultarRolesYPermisos.php';
                                traerRolesEnFormatoSelect();
                                ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="">Estado</label>
                              <select name="estado" class="form-control" id="estado">
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                              </select>
                            </div>
                         

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                          <button type="submit" class="btn btn-primary">Crear</button>
                          </form>
                        </div>

                      </div>
                    </div>
                  </div>
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
                    <th>Estado</th>
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
                    <th>Estado</th>
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
      var data = <?php require '../consultasdb/empleados/empleados.php';
      echo traerDatosEmpleados(); ?>;
      $(function () {
        $("#tabla1").DataTable({
          language: spanish,
          "responsive": true,
          "lengthChange": false,
          "autoWidth": false,
          "buttons": ["excel", "pdf", "print", "colvis"],
          columns: [
            { title: 'Documento' },
            { title: 'Tipo Documento' },
            { title: 'Nombres' },
            { title: 'Apellidos' },
            { title: 'Correo Electronico' },
            { title: 'Telefono' },
            { title: 'Rol' },
            { title: 'Estado' },
            {
              title: 'Acciones',
              searchable: false,
              orderable: false,
              render: function (data, type, row) {
                return '<button class="btn btn-sm" onclick="editarUsuario(' + row[0] + ')"><i class="fas fa-edit"></i> Editar</button>' +
                  '<button class="btn btn-sm reset" onclick="resetearContrasena(' + row[0] + ')"><i class="fas fa-key"></i> Cambiar Contraseña</button>' +
                  '<button class="btn btn-sm" onclick="cambiarEstadoUsuario(' + row[0] + ')"><i class="fas fa-power-off"></i> Cambiar estado</button>';
              }

            }
          ],
          data: data

        }).buttons().container().appendTo('#tabla1_wrapper .col-md-6:eq(0)');

      });


      document.getElementById('formularioCrearEmpleado').addEventListener('submit', function (e) {
        e.preventDefault(); // Evita el envío del formulario por defecto

        // Realiza una solicitud AJAX para procesar el formulario
        $.ajax({
          type: 'POST',
          url: '../consultasdb/empleados/crearempleado.php',
          data: $(this).serialize(),
          success: function (response) {

          
           
            if (response === "success") {
              Swal.fire({
                title: 'Éxito',
                text: 'El cliente se ha creado correctamente',
                icon: 'success'
              }).then(() => {
                // Recargar la página actual
                location.reload();
              });
            } else if (response === 'error') {
              Swal.fire('Error', 'Hubo un problema al crear el cliente', 'error');
            } else if (response === 'errorExiste') {
              
              Swal.fire('Error', 'Ya existe ese cliente', 'error');
            }
          }
        });

      });



      function editarUsuario(documento) {
        // Implementa la lógica para editar el usuario con el documento proporcionado
        console.log('Editar usuario con documento:', documento);
      }


      function resetearContrasena(documento) {
        // Implementa la lógica para editar el usuario con el documento proporcionado
        console.log('Cambiar contraseña usuario con documento:', documento);
      }

      function cambiarEstadoUsuario(documento) {

        console.log('Cambiar estado del usuario con documento:', documento);
      }
    </script>
  </div>
</body>

</html>