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
              require '../consultasdb/reservar/habitaciones.php';
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
        var idCliente = "<?php echo $_SESSION['id_usuario']; ?>"

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

</body>

</html>