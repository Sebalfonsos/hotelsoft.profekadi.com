<?php
session_start();
?>

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
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




</head>

<style>
  #sugerencias {
    max-width: 250px;
    margin-top: 5px;
    position: absolute;
    z-index: 1;
  }

  #sugerencias ul {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  #sugerencias li {
    padding: 8px;
    cursor: pointer;
  }

  #sugerencias li:hover {
    background-color: #f5f5f5;
  }
</style>



<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div>


    <!-- Content Wrapper. Contains page content -->
    <div>
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="row d-flex align-items-center">
          <div class="text-center;" style="margin-left: 1%;">
            <i class="nav-icon fas fa-sign-in-alt" style=" font-size: 2rem;"></i>

          </div>
          <h1 style="padding-left: 1%;">Reservar</h1>
        </div>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">

            <!-- Fila de habitaciones ocupando la mitad del ancho -->
            <div class="col-md-8">

              <?php
              require '../consultasdb/recepcion/recepcion.php';
              traerHabitaciones();
              ?>
            </div>

            <!-- Columna del formulario de reserva ocupando la derecha de la pantalla -->

            <div class="col-md-4 ">


              <div class="card card-primary sticky-top">
                <div class="card-header">
                  <h3 class="card-title">Reservar</h3>
                </div>


                <form>
                  <div class="card-body">

                    <div class="form-group mb-1">
                      <label for="">Identificación Cliente</label>
                      <input type="number" id="busquedaIdCliente" name="busqueda" class="form-control"
                        placeholder="Ingresa tu búsqueda" oninput="buscarSugerencias(this.value)">
                      <div id="sugerencias" class="bg-light rounded"></div>
                    </div>
                    <button type="button" id="botonBuscar" class="btn btn-primary" disabled
                      onclick="obtenerInformacionCliente()">Más info</button>


                    <div class="form-group">
                      <label for="LabelIdHabitacion">Numero Habitacion</label>
                      <select class="form-control" name="" id="habitacion" required>
                        <option selected disabled value="">Selecciona una Habitación</option>
                        <?php
                        traerNumHabitacionesSelect();
                        ?>
                      </select>
                    </div>


                    <div class="form-group">
                      <label for="fecha_entrada">Fecha de entrada:</label>
                      <input class="form-control" type="date" name="fecha_entrada" id="fecha_entrada" required>

                    </div>

                    <div class="form-group">
                      <label for="fecha_salida">Fecha de salida:</label>
                      <input class="form-control" type="date" name="fecha_salida" id="fecha_salida" required>

                    </div>



                  </div>

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Reservar</button>
                  </div>
                </form>
              </div>


            </div>

          </div>

        </div>
      </section>

      <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->




  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>

  <script>
    function validarFechas() {
      var fechaEntrada = document.getElementById('fecha_entrada').value;
      var fechaSalida = document.getElementById('fecha_salida').value;

      if (new Date(fechaSalida) <= new Date(fechaEntrada)) {

        Swal.fire({
          title: "Epa!",
          text: "La fecha de salida debe ser posterior a la fecha de entrada.",
          icon: "error",
          confirmButtonColor: '#F06060' // Cambia el color de fondo del botón "OK"
        });

        return false;
      }

      // Si la validación pasa, puedes continuar con el envío del formulario
      return true;
    }


  </script>

  <script>


    $(document).ready(function () {
      // Intercepta el envío del formulario
      $('form').submit(function (e) {
        e.preventDefault(); // Detiene el envío normal del formulario
        if (!validarFechas()) {
          return false; // Detiene la ejecución del resto del código
        }
        // Obtén los datos del formulario
        var habitacion = document.getElementById('habitacion').value;
        var fechaEntrada = document.getElementById('fecha_entrada').value;
        var fechaSalida = document.getElementById('fecha_salida').value;
        var idCliente = document.getElementById('busquedaIdCliente').value;

        var fechaEntradaDate = new Date(fechaEntrada + 'T00:00:00-05:00');
        var hoy = new Date();
        hoy.setHours(0, 0, 0, 0);

        console.log(fechaEntradaDate)
        console.log(hoy)
        console.log(fechaSalida)

        if (fechaEntradaDate >= hoy) {
          // La fecha es después del día de hoy
          hacerConsulta(idCliente, habitacion, fechaEntrada, fechaSalida)
        } else {
          Swal.fire({
            title: "Ups...",
            text: "No puedes reservar una habitacion para una fecha anterior al dia de hoy.",
            icon: "warning"
          });
        }






      });
    });

    function hacerConsulta(idCliente, habitacion, fechaEntrada, fechaSalida) {
      // Realizar la solicitud AJAX
      $.ajax({
        type: "POST",
        url: "../consultasdb/recepcion/recepcion.php", // Reemplaza con la ruta correcta a tu archivo PHP
        data: {
          idCliente: idCliente,
          habitacion: habitacion,
          fechaEntrada: fechaEntrada,
          fechaSalida: fechaSalida
        },
        success: function (respuesta) {
          console.log(respuesta); // Muestra la respuesta en la consola
          if (respuesta == "si está ocupada") {

            Swal.fire({
              title: "Ups...",
              text: "La habitación ya está reservada en algun dia entre las fechas que seleccionaste, intenta cambiar de habitación ;)",
              icon: "warning"
            });

          } else if (respuesta == "Puedes reservar") {
            obtenerPrecioHabitacion(idCliente, habitacion, fechaEntrada, fechaSalida);

          }


        },
        error: function () {
          console.log("Error en la solicitud AJAX");
        }
      });
    }

    function obtenerPrecioHabitacion(idCliente, habitacion, fechaEntrada, fechaSalida) {
      $.ajax({
        type: 'POST',
        url: '../consultasdb/reservar/obtenerPrecioHabitacion.php',
        data: {
          idHabitacion: habitacion,
          fechaEntrada: fechaEntrada,
          fechaSalida: fechaSalida
        },
        success: function (response) {
          // Manejar la respuesta del servidor
          console.log(response);

          // Analizar la respuesta JSON (asegúrate de que el servidor esté devolviendo JSON)
          var costoTotal = response;

          // Verificar si la consulta fue exitosa
          if (response) {

            // Mostrar el SweetAlert con la información de la reserva
            Swal.fire({
              title: "¿Estás seguro de reservar?",
              text: "El costo total de la reserva es: $" + costoTotal,
              icon: "warning",
              showCancelButton: true,
              confirmButtonColor: "#3085d6",
              cancelButtonColor: "#d33",
              confirmButtonText: "Sí, reservar"
            }).then((result) => {
              if (result.isConfirmed) {
                reservar(idCliente, habitacion, fechaEntrada, fechaSalida, costoTotal)
              }
            });
          } else {
            // Mostrar un mensaje de error si la consulta no fue exitosa
            Swal.fire({
              title: "Error",
              text: "Hubo un error al obtener el precio de la habitación",
              icon: "error"
            });
          }
        }
      });
    }

    function reservar(idCliente, habitacion, fechaEntrada, fechaSalida, costoTotal) {

      $.ajax({
        type: "POST",
        url: "../consultasdb/reservar/realizarReserva.php", // Reemplaza con la ruta correcta a tu archivo PHP
        data: {
          idCliente: idCliente,
          habitacion: habitacion,
          fechaEntrada: fechaEntrada,
          fechaSalida: fechaSalida,
          costoTotal: costoTotal
        },
        success: function (respuesta) {
          console.log(respuesta + idCliente); // Muestra la respuesta en la consola
          if (respuesta == "Reserva exitosa") {

            Swal.fire({
              title: "Listo!",
              text: "Reserva exitosa",
              icon: "success"
            });

          } else {


          }


        },
        error: function () {
          console.log("Error en la solicitud AJAX");
        }
      });

    }
    function calcularDiferenciaDias(fechaEntrada, fechaSalida) {
      var dateEntrada = new Date(fechaEntrada);
      var dateSalida = new Date(fechaSalida);
      var diferenciaTiempo = dateSalida - dateEntrada;
      var diferenciaDias = Math.ceil(diferenciaTiempo / (1000 * 60 * 60 * 24));
      return diferenciaDias;
    }
    function seleccionar(id) {
      document.getElementById("habitacion").value = id
    }

  </script>

  <script>

    function actualizarBoton() {
      const campoBusqueda = document.getElementById('busquedaIdCliente');
      const botonBuscar = document.getElementById('botonBuscar');

      // Habilita el botón si hay texto en el campo de búsqueda, de lo contrario, desactívalo
      botonBuscar.disabled = campoBusqueda.value.trim() === '';
    }

    function buscarSugerencias(entrada) {
      actualizarBoton();

      if (entrada.trim() === '') {
        // Si está vacía, oculta las sugerencias y sale de la función
        document.getElementById('sugerencias').innerHTML = '';
        return;
      }
      // Aquí puedes realizar una solicitud a tu servidor para obtener sugerencias
      // Por ahora, utilizaremos un conjunto de sugerencias estático
      const sugerencias = <?php include '../consultasdb/reservarRecepcionista/reservarRecepcionista.php' ?>;

      // Filtra las sugerencias que coincidan con la entrada
      const coincidencias = sugerencias.filter(sugerencia =>
        sugerencia.toLowerCase().includes(entrada.toLowerCase())
      );

      // Muestra las sugerencias
      mostrarSugerencias(coincidencias.slice(0, 5));
    }

    function mostrarSugerencias(sugerencias) {
      const sugerenciasDiv = document.getElementById('sugerencias');
      sugerenciasDiv.innerHTML = '';

      if (sugerencias.length > 0) {
        const ul = document.createElement('ul');
        sugerencias.forEach(sugerencia => {
          const li = document.createElement('li');
          li.textContent = sugerencia;
          li.addEventListener('click', () => seleccionarSugerencia(sugerencia));
          ul.appendChild(li);
        });
        sugerenciasDiv.appendChild(ul);
      } else {
        sugerenciasDiv.innerHTML = 'No se encontraron sugerencias';
      }
    }

    function seleccionarSugerencia(sugerencia) {
      document.getElementById('busquedaIdCliente').value = sugerencia;
      // Puedes realizar acciones adicionales al seleccionar una sugerencia si es necesario
      document.getElementById('sugerencias').innerHTML = ''; // Limpia las sugerencias

    }


    function obtenerInformacionCliente() {
      // Obtén el valor del campo de búsqueda
      const busquedaIdCliente = document.getElementById('busquedaIdCliente').value;

      // Realiza la solicitud AJAX a tu servidor
      // Aquí asumo que tienes un archivo PHP llamado obtener_info_cliente.php que manejará la consulta
      // Ajusta la URL y los datos de la solicitud según tu estructura y necesidades
      $.ajax({
        type: 'POST',
        url: '../consultasdb/reservarRecepcionista/obtener_info_cliente.php',
        data: { idCliente: busquedaIdCliente },
        success: function (response) {
          // Procesa la respuesta del servidor

          console.log(response)
          const infoCliente = JSON.parse(response);

          // Muestra el SweetAlert con la información del cliente
          Swal.fire({
            title: 'Información del Cliente',
            html: `<p><strong>Identificación:</strong> ${busquedaIdCliente}</p>
            <p><strong>Nombre:</strong> ${infoCliente.nombre} ${infoCliente.apellido}</p>
                 <p><strong>Correo:</strong> ${infoCliente.correoelectronico}</p>
                 <p><strong>Teléfono:</strong> ${infoCliente.telefono}</p>`,
            icon: 'info',
            confirmButtonText: 'Aceptar'
          });
        },
        error: function (error) {
          // Maneja errores de la solicitud AJAX
          console.error('Error en la solicitud AJAX:', error);
        }
      });
    }
  </script>

</body>

</html>