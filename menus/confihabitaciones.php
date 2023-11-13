<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hotel Soft | Lista Habitaciones</title>

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
  <!-- Site wrapper -->
  <div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    <div class="">
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

        <div class="container-fluid ">
          <div class="">

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
                      <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#crearHabitacionModal">
                        Crear Habitación
                      </button>
                      <div class="modal fade" id="crearHabitacionModal" tabindex="-1" role="dialog"
                        aria-labelledby="crearHabitacionModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-vertical" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="crearHabitacionModalLabel">Crear Habitación</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form id="formularioCrearHabitacion" action="../consultasdb/crearhabitaciones.php"
                                method="post">
                                <div class="form-group">
                                  <label for="numeroHabitacion">Número de Habitación</label>
                                  <input type="text" name="numHabitacion" class="form-control" id="numeroHabitacion"
                                    placeholder="Ej. 101">
                                </div>
                                <div class="form-group">
                                  <label for="tipoHabitacion">Tipo de Habitación</label>
                                  <select name="tipoHabitacion" class="form-control" id="tipoHabitacion">
                                    <option value="Individual">Individual</option>
                                    <option value="Doble">Doble</option>
                                    <option value="Suite">Suite</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="estadoHabitacion">Estado de la Habitación</label>
                                  <select name="estadoHabitacion" class="form-control" id="estadoHabitacion">
                                    <option value="1">Disponible</option>
                                    <option value="0">Deshabilitada</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="precopHabitacion">Precio de Habitación</label>
                                  <input name="precioHabitacion" type="text" class="form-control" id="precioHabitacion"
                                    placeholder="Ej. $30,000">
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                              <button type="submit" class="btn btn-primary">Crear Habitación</button>
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
                        <th>N° Habitación</th>
                        <th>Categoria</th>
                        <th>Precio</th>
                        <th>Estado</th>
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
                        <th>Estado</th>
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
            var data = <?php require '../consultasdb/confihabitaciones/habitaciones.php';
            echo traerDatosHabitaciones(); ?>;
            $(function () {
              $("#tabla1").DataTable({
                language: spanish,
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["excel", "pdf", "print", "colvis"],
                columns: [{
                  title: 'N° Habitación'
                },
                {
                  title: 'Categoria'
                },
                {
                  title: 'Precio'
                },
                {
                  title: 'Estado'
                },
                {
                  title: 'Acciones',
                  searchable: false,
                  orderable: false,
                  render: function (data, type, row) {
                    return '<button class="btn btn-sm" onclick="editarHabitacion(\'' + row[5] + '\')"><i class="fas fa-edit"></i> Editar</button>' +
                      '<button class="btn btn-sm" onclick="cambiarEstadoHabitacion('+row[5]+','+row[0]+')"><i class="fas fa-power-off"></i> Cambiar estado</button>';
                  }

                }
                ],
                data: data

              }).buttons().container().appendTo('#tabla1_wrapper .col-md-6:eq(0)');

            });
            document.getElementById('formularioCrearHabitacion').addEventListener('submit', function (e) {
              e.preventDefault(); // Evita el envío del formulario por defecto

              // Realiza una solicitud AJAX para procesar el formulario
              $.ajax({
                type: 'POST',
                url: '../consultasdb/confihabitaciones/crearhabitaciones.php',
                data: $(this).serialize(),
                success: function (response) {



                  if (response === "success") {
                    Swal.fire({
                      title: 'Éxito',
                      text: 'La habitación se ha creado correctamente',
                      icon: 'success'
                    }).then(() => {
                      // Recargar la página actual
                      location.reload();
                    });
                  } else if (response === 'error') {
                    Swal.fire('Error', 'Hubo un problema al crear la habitación', 'error');
                  } else if (response === 'errorExiste') {

                    Swal.fire('Error', 'Ya existe una habitación con ese numero', 'error');
                  }
                }
              });

            });



            function editarUsuario(documento) {
              // Implementa la lógica para editar el usuario con el documento proporcionado
              console.log('Editar usuario con documento:', documento);
            }



            function cambiarEstadoHabitacion(idHabitacion, numHabitacion) {



              Swal.fire({
                title: "Estas seguro?",
                text: "Vas a cambiar el estado de la habitacion # " + numHabitacion,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Cancelar",
                confirmButtonText: "Si!"
              }).then((result) => {
                if (result.isConfirmed) {

                  $.ajax({
                    type: 'POST',
                    url: '../consultasdb/confihabitaciones/update_habitaciones_state.php',
                    data: { idHabitacion: idHabitacion },
                    success: function (response) {
                      console.log(response)
                      if (response == "Estado actualizado correctamente") {
                        Swal.fire({
                          title: "Listo",
                          text: "El estado ha sido cambiado con exito.",
                          icon: "success"
                        }).then(() => {

                          location.reload();
                        });

                      }else{
                        Swal.fire({
                          title: "Upss..",
                          text: "Hubo un error al cambiar el estado",
                          icon: "error"
                        })
                      }

                    }
                  });

                }
              });
            }
          </script>
      </section>
</body>

</html>