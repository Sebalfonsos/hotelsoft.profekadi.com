<?php
$avisoIdentificación = "";
$avisoCorreo = "";

$datos = isset($_POST["Nombres"]) && isset($_POST["Apellidos"]) && isset($_POST["TipoIdentificacion"]) && isset($_POST["Identificacion"]) && isset($_POST["Telefono"]) && isset($_POST["Correo"]) && isset($_POST["Contrasena"]);

if ($datos) {

    $nombres = $_POST["Nombres"];
    $apellidos = $_POST["Apellidos"];
    $tipoIdentificacion = $_POST["TipoIdentificacion"];
    $identificacion = (int) $_POST['Identificacion'];
    $telefono = $_POST["Telefono"];
    $correoelectronico = $_POST["Correo"];
    $contrasenahash = password_hash($_POST["Contrasena"], PASSWORD_DEFAULT);


    require 'consultasdb/verificarExistenciaUsuario.php';
    $usuarioExistente = verificarUsuarioExistente($identificacion, $correoelectronico);
    if ($usuarioExistente) {
        if ($usuarioExistente['idUsuario'] == $identificacion) {
            $avisoIdentificación = "El número de identificación ya está registrado.";
        } elseif ($usuarioExistente['correoelectronico'] == $correoelectronico) {
            $avisoCorreo = "El correo ya está registrado. Por favor, use otro correo.";
        }
    } else {

        require 'consultasdb/registrarUsuario.php';
        $registrado = registrarUsuario($identificacion, $contrasenahash, $nombres, $apellidos, $correoelectronico, $telefono, $tipoIdentificacion);
        if ($registrado) {
            header('location: login.php?registrado=true');
            exit();
        } else {
            echo "Error al registrar el usuario: " . $stmt->error;
        }
    }


}
?>