<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel Soft | Roles y permisos</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="hold-transition sidebar-mini">





    <!-- Content Wrapper. Contains page content -->
    <div class="">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Roles y permisos</h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="column">
                <div class="col-3 mb-2 ml-1">
                    <button id="guardarCambios" onclick="guardarCambios()" type="button"
                        class="btn btn-block btn-primary btn-lg" disabled>Guardar cambios</button>
                </div>
                <div class="col-3 mb-2 ml-1">
                    <button id="crearRol" type="button" class="btn btn-block btn-primary btn-lg" data-toggle="modal"
                        data-target="#modalCrearRol">Crear Rol</button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="modalCrearRol" tabindex="-1" role="dialog" aria-labelledby="modalCrearRol"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle">Crear Rol</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="formularioCrearRol">
                                    <div class="form-group">
                                        <label for="nombreRol">Nombre del Rol:</label>
                                        <input type="text" class="form-control" id="nombreRol" name="nombreRol"
                                            placeholder="Ingrese el nombre del rol" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row ml-2">


                    <!-- List group -->
                    <div class="list-group col-3" id="listaRoles" role="tablist">

                        <?php
                        require '../consultasdb/roles/consultarRolesYPermisos.php';
                        traerRoles();


                        ?>

                    </div>

                    <!-- Tab panes -->

                    <div class="tab-content col-8">
                        <label for="">Acceso a los modulos:</label>

                        <?php

                        traerPermisos();
                        ?>

                    </div>

                </div>
            </div>


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.2.0
        </div>
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->


    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>

    <script>

        const initialState = {};

        function guardarEstadoInicial() {
            // Obtener todos los checkboxes
            const checkboxes = document.querySelectorAll('input[pertenece]');

            checkboxes.forEach(checkbox => {
                // Obtener el valor del atributo 'pertenece' para identificar la categoría
                const categoria = checkbox.getAttribute('pertenece');

                // Si la categoría aún no existe en initialState, crear un objeto vacío para ella
                if (!initialState[categoria]) {
                    initialState[categoria] = {};
                }

                // Almacenar el estado del checkbox en la categoría correspondiente
                initialState[categoria][checkbox.id] = checkbox.checked;
            });
        }

        function detectarCambios(identificador) {
            const cambios = [];
            const checkboxes = document.querySelectorAll(`input[pertenece="${identificador}"]`);

            checkboxes.forEach(checkbox => {
                const estadoInicial = initialState[identificador] && initialState[identificador][checkbox.id];
                const estadoActual = checkbox.checked;

                if (estadoInicial !== undefined && estadoInicial !== estadoActual) {
                    const cambioInfo = {
                        id: checkbox.id,
                        estadoAnterior: estadoInicial ? 1 : 0, // 1 si estaba seleccionado, 0 si no
                        estadoActual: estadoActual ? 1 : 0 // 1 si está seleccionado, 0 si no
                    };
                    cambios.push(cambioInfo);
                }
            });

            console.log(`Cambios en la categoría '${identificador}':`);
            cambios.forEach(cambio => {
                console.log(`ID: ${cambio.id}, Estado Anterior: ${cambio.estadoAnterior}, Estado Actual: ${cambio.estadoActual}`);
            });
            guardarEstadoInicial()

            return cambios

            
        }



        // ajax para añadir rol
        document.getElementById('formularioCrearRol').addEventListener('submit', function (e) {
            e.preventDefault(); // Evita el envío del formulario por defecto

            // Realiza una solicitud AJAX para procesar el formulario
            $.ajax({
                type: 'POST',
                url: '../consultasdb/roles/crearRol.php',
                data: $(this).serialize(),
                success: function (response) {
                    if (response === 'success') {
                        Swal.fire({
                            title: 'Éxito',
                            text: 'El rol se ha creado correctamente',
                            icon: 'success'
                        }).then(() => {
                            // Recargar la página actual
                            location.reload();
                        });
                    } else if (response === 'error') {
                        Swal.fire('Error', 'Hubo un problema al crear el rol', 'error');
                    } else if (response === 'errorExiste') {
                        Swal.fire('Error', 'Ya existe un rol con ese nombre', 'error');
                    }
                }
            });
            
        });

      






        // Función para activar el botón de "Guardar Cambios" cuando se haga un cambio en los checkboxes
        function activarBotonGuardarCambios() {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            var guardarCambiosButton = document.getElementById('guardarCambios');
            var crearRolButton = document.getElementById('crearRol');
            var listItems = document.querySelectorAll('.list-group a');

            checkboxes.forEach(function (checkbox) {
                checkbox.addEventListener('change', function () {
                    guardarCambiosButton.disabled = false;
                    crearRolButton.disabled = true;
                    // Desactiva los elementos <a> que no tienen la clase "active"
                    listItems.forEach(function (item) {
                        if (!item.classList.contains('active')) {
                            item.classList.add('disabled');
                        } else {
                            item.classList.remove('disabled');
                        }
                    });
                });
            });
        }



        // Función para guardar los cambios y quitar la clase "disabled"
        function guardarCambios() {

            const enlaceActivo = document.querySelector("#listaRoles a.active");
            var textoEnlace;
            var idRol;
            // Comprobar si se encontró un enlace activo
            if (enlaceActivo) {
                textoEnlace = enlaceActivo.textContent;
                console.log("ID: " + enlaceActivo.getAttribute("identificadorrol"))
                idRol = enlaceActivo.getAttribute("identificadorrol");
            }

            var cambios = detectarCambios(idRol);

            actualizarPermisos(idRol, cambios)

            
            // Quita la clase "disabled" de los elementos <a>
            var listItems = document.querySelectorAll('.list-group a');
            listItems.forEach(function (item) {
                item.classList.remove('disabled');
            });
            // Desactiva el botón después de guardar los cambios
            document.getElementById('guardarCambios').disabled = true;
            document.getElementById('crearRol').disabled = false;
        }


          //actualizar permisos ajax
          function actualizarPermisos(idRol, permisosArray) {
            $.ajax({
                type: "POST",
                url: "../consultasdb/roles/actualizarPermisos.php", // Ruta al archivo PHP
                data: {
                    idRol: idRol,
                    permisos: permisosArray
                },
                success: function (response) {
                    if (response === 'exito') {
                        Swal.fire({
                            title: 'Éxito',
                            text: 'Permisos actualizados con exito',
                            icon: 'success'
                        });
                    } else if (response === 'error') {
                        Swal.fire('Error', 'Hubo un problema al actualizar los permisos', 'error');
                    } 
                }
                
            });
        }

        // Activa el botón cuando se carga la página
        activarBotonGuardarCambios();

        //guardar estado incial checkboxes
        guardarEstadoInicial();
    </script>



</body>

</html>