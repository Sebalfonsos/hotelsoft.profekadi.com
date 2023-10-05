<?php
$avisoIdentificación = "";
$avisoCorreo = "";

$datos = isset($_POST["Nombres"]) && isset($_POST["Apellidos"]) && isset($_POST["TipoIdentificacion"]) && isset($_POST["Identificacion"]) && isset($_POST["Telefono"]) && isset($_POST["Correo"]) && isset($_POST["Contrasena"]);

if ($datos) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombres = $_POST["Nombres"];
        $apellidos = $_POST["Apellidos"];
        $tipoIdentificacion = $_POST["TipoIdentificacion"];
        $identificacion = $_POST["Identificacion"];
        $telefono = $_POST["Telefono"];
        $correoelectronico = $_POST["Correo"];
        $contrasenahash = password_hash($_POST["Contrasena"], PASSWORD_DEFAULT);
        require 'consultasdb/conexion.php';
        // Verificar si el correo o la identificación ya existen en la base de datos
        $sql = "SELECT * FROM Usuarios WHERE correoelectronico = ? OR idUsuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $correoelectronico, $identificacion);
        $stmt->execute();

        $result = $stmt->get_result();



        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if ($row['idUsuario'] == $identificacion) {
                $avisoIdentificación = "El número de identificación ya está registrado.";
            } elseif ($row['correoelectronico'] == $correoelectronico) {
                $avisoCorreo = "El correo ya está registrado. Por favor, use otro correo.";
            }
        } else {
            // Insertar el nuevo usuario en la base de datos
            
            $insertQuery = "INSERT INTO `Usuarios` (`idUsuario`, `contrasena`, `nombre`, `apellido`, `correoelectronico`, `telefono`, `TipoIdentificacion_idTipoIdentificacion`) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($insertQuery);
            $stmt->bind_param("ssssssi", $identificacion, $contrasenahash, $nombres, $apellidos, $correoelectronico, $telefono, $tipoIdentificacion);
            if ($stmt->execute()) {


                $stmt->close();
                $conn->close();

                header('location: login.php?registrado=true');
                exit();
            } else {
                echo "Error al registrar el usuario: " . $stmt->error;
            }
        }
        $stmt->close();
        $conn->close();
    }
}
?>