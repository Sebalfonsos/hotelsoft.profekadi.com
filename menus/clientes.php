<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HotelSoft | Lista Clientes</title>

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
        <h1 style="padding-left: 1%;">Clientes</h1>
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
                <h3 class="card-title"> Listado de Clientes </h3>
              </div>
            </div>

            <div class="card-body ">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crearClienteModal">
                    Crear Cliente
                  </button>
                  <div class="modal fade" id="crearClienteModal" tabindex="-1" role="dialog"
                    aria-labelledby="crearClienteModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="crearClienteModalLabel">Crear Cliente</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form id="formularioCrearCliente">
                            <div class="form-group">
                              <label for="">Documento</label>
                              <input required type="number" name="documento" class="form-control" id=" "
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
                              <input required name="nombre" type="text" class="form-control" id="nombres"
                                placeholder="Ej. Carlos">
                            </div>
                            <div class="form-group">
                              <label for="">Apellidos</label>
                              <input required name="apellido" type="text" class="form-control" id="apellidos"
                                placeholder="Ej. Fonseca">
                            </div>
                            <div class="form-group">
                              <label for="">Correo Electronico</label>
                              <input name="correoElectronico" type="email" class="form-control" id="correoElectronico"
                                placeholder="Ej. hotelsoft@hotmail.com">
                            </div>
                            <div class="form-group">
                              <label for="">Contraseña</label>
                              <input minlength="8" required type="password" name="contrasena" class="form-control" id="contrasena"
                                placeholder="Ej. 100288790">
                            </div>
                            <div class="form-group">
                              <label for="">Telefono</label>
                              <input name="telefono" type="text" class="form-control" id="telefono"
                                placeholder="Ej. $3005186039">
                            </div>

                            <div class="form-group">
                              <label for="">Estado</label>
                              <select required name="estado" class="form-control" id="estado">
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

    <!-- SEGUNDO MODAL -->

    <div class="card-body ">
      <div class="row mb-2">
        <div class="col-sm-6">

          <div class="modal fade" id="ModificarCliente" tabindex="-1" role="dialog"
            aria-labelledby="ModificarClienteLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="ModificarClienteLabel">Editar información del cliente</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="formularioModificarCliente">
                    <div class="form-group">
                      <label for="">Documento</label>
                      <input disabled type="text" name="documento" class="form-control" id="modificarDocumento"
                        placeholder="Ej. 100288790">
                    </div>
                    <div class="form-group">
                      <label for="">Tipo Documento</label>
                      <select required class="form-control" name="tipoDocumento" id="modificarTipoDocumento">
                        <option selected disabled value="">Tipo de Identificación</option>
                        <?php
                        include '../consultasdb/traerTiposDeIdentificacion.php';

                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="">Nombres</label>
                      <input required name="nombre" type="text" class="form-control" id="modificarNombres"
                        placeholder="Ej. Carlos">
                    </div>
                    <div class="form-group">
                      <label for="">Apellidos</label>
                      <input required name="apellido" type="text" class="form-control" id="modificarApellidos"
                        placeholder="Ej. Fonseca">
                    </div>
                    <div class="form-group">
                      <label for="">Correo Electronico</label>
                      <input required name="correoElectronico" type="text" class="form-control" id="modificarCorreoElectronico"
                        placeholder="Ej. hotelsoft@hotmail.com">
                    </div>

                    <div class="form-group">
                      <label for="">Telefono</label>
                      <input name="telefono" type="text" class="form-control" id="modificarTelefono"
                        placeholder="Ej. $3005186039">
                    </div>




                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  <button type="button" onclick="enviarFormularioModificar()" class="btn btn-primary">Modificar</button>
                  </form>
                </div>

              </div>
            </div>
          </div>
        </div>

      </div>
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
      var data = <?php require '../consultasdb/clientes/clientes.php';
      echo traerDatosClientes(); ?>;
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
            { title: 'Estado' },
            {
              title: 'Acciones',
              searchable: false,
              orderable: false,
              render: function (data, type, row) {
                return '<button class="btn btn-sm" onclick="editarUsuario(' + row[0] + ',\'' + row[1] + '\'' + ',\'' + row[2] + '\'' + ',\'' + row[3] + '\'' + ',\'' + row[4] + '\'' + ',\'' + row[5] + '\' )"><i class="fas fa-edit"></i> Editar</button>' +
                  '<button class="btn btn-sm reset" onclick="resetearContrasena(' + row[0] + ',\'' + row[2] + '\')"><i class="fas fa-key"></i> Cambiar Contraseña</button>' +
                  '<button class="btn btn-sm" onclick="cambiarEstadoCliente(' + row[0] + ',\'' + row[2] + '\')"><i class="fas fa-power-off"></i> Cambiar estado</button>';
              }

            }
          ],
          data: data

        }).buttons().container().appendTo('#tabla1_wrapper .col-md-6:eq(0)');

      });


      document.getElementById('formularioCrearCliente').addEventListener('submit', function (e) {
        e.preventDefault(); // Evita el envío del formulario por defecto

        // Realiza una solicitud AJAX para procesar el formulario
        $.ajax({
          type: 'POST',
          url: '../consultasdb/clientes/crearcliente.php',
          data: $(this).serialize(),
          success: function (response) {


            console.log(response)
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


      function editarUsuario(documento, tipoDocumento, nombres, apellidos, correo, telefono) {

        console.log('Editar usuario con documento:', documento);

        $('#ModificarCliente').modal('show');
        document.getElementById('modificarDocumento').value = documento
        var select = document.getElementById('modificarTipoDocumento');

        // Iterar sobre las opciones y seleccionar la que coincide con el contenido deseado
        for (var i = 0; i < select.options.length; i++) {
          if (select.options[i].text === tipoDocumento) {
            // Cambiar la opción seleccionada
            select.options[i].selected = true;
            break; // Terminar el bucle ya que encontramos la opción deseada
          }
        }

        document.getElementById('modificarNombres').value = nombres
        document.getElementById('modificarApellidos').value = apellidos
        document.getElementById('modificarCorreoElectronico').value = correo
        document.getElementById('modificarTelefono').value = telefono
      }

      function enviarFormularioModificar() {
        // Obtener los valores del formulario
        var idUsuario = $('#modificarDocumento').val();
        var tipoDocumento = $('#modificarTipoDocumento').val();
        var nombres = $('#modificarNombres').val();
        var apellidos = $('#modificarApellidos').val();
        var correoElectronico = $('#modificarCorreoElectronico').val();
        var telefono = $('#modificarTelefono').val();

        
        if (!idUsuario || !tipoDocumento || !nombres || !apellidos || !correoElectronico) {
          alert('Todos los campos marcados como requeridos deben estar completos');
          return;
        }

        // Validar el formato del correo electrónico
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(correoElectronico)) {
          alert('Ingrese una dirección de correo electrónico válida');
          return;
        }

        // Realizar la verificación del correo electrónico antes de la solicitud AJAX
        $.ajax({
          type: 'POST',
          url: '../consultasdb/clientes/modificarCliente.php',
          data: {
            idUsuario: idUsuario,
            tipoDocumento: tipoDocumento,
            nombres: nombres,
            apellidos: apellidos,
            correoElectronico: correoElectronico,
            telefono: telefono
          },
          success: function (response) {
            // Manejar la respuesta del servidor
            console.log(response);

            // Cerrar el modal si la modificación fue exitosa
            if (response === "Modificación exitosa") {
              Swal.fire({
                title: "Listo",
                text: "Información modificada correctamente",
                icon: "success"
              }).then(() => {
                // Recargar la página después de cerrar el SweetAlert
                location.reload();
              });
              $('#ModificarCliente').modal('hide');
            } else if (response === "Error: El correo electrónico ya está en uso") {
              // Mostrar mensaje específico si el correo ya existe
              Swal.fire({
                title: "Upss",
                html: "El correo electrónico <strong>" + correoElectronico + "</strong> ya está en uso por otro usuario",
                icon: "error"
              });
            } else {
              // Mostrar algún mensaje de error genérico si es necesario
              Swal.fire({
                title: "Upss",
                text: "Hubo un error al modificar la información",
                icon: "error"
              });
            }
          }
        });
      }


      function resetearContrasena(documento, nombre) {

        Swal.fire({
          title: "Nueva contraseña para el usuario " + nombre,
          html:
            '<input type="password" id="password" placeholder="ContraseñaImposible123" class="swal2-input" autocomplete="new-password">',
          showCancelButton: true,
          confirmButtonText: "Cambiar Contraseña",
          preConfirm: () => {
            const password = Swal.getPopup().querySelector("#password").value;
            if (!password) {
              Swal.showValidationMessage("Por favor, ingresa la nueva contraseña");
            }
            return password;
          },
        }).then((result) => {
          if (result.isConfirmed) {
            const newPassword = result.value;

            // Realizar la solicitud AJAX
            $.ajax({
              type: 'POST',
              url: '../consultasdb/clientes/update_password.php',
              data: { userId: documento, newPassword: newPassword },
              success: function (response) {
                if (response == "Contraseña actualizada correctamente") {
                  Swal.fire({
                    title: "Listo",
                    text: "La contraseña ha sido cambiada con éxito.",
                    icon: "success"
                  }).then(() => {
                    // Recargar la página después de cerrar el SweetAlert
                    location.reload();
                  });
                } else {
                  Swal.fire({
                    title: "Error",
                    text: "Hubo un error al cambiar la contraseña.",
                    icon: "error"
                  });
                }
              }
            });
          }
        });

      }

      function cambiarEstadoCliente(documento, nombre) {



        Swal.fire({
          title: "Estas seguro?",
          text: "Vas a cambiar el estado del cliente " + nombre,
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
              url: '../consultasdb/clientes/update_user_state.php',
              data: { userId: documento },
              success: function (response) {

                if (response == "Estado actualizado correctamente") {
                  Swal.fire({
                    title: "Listo",
                    text: "El estado ha sido cambiado con exito.",
                    icon: "success"
                  }).then(() => {

                    location.reload();
                  });

                }

              }
            });

          }
        });
      }

    </script>




</body>

</html>