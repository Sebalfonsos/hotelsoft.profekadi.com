<?php
$avisoIdentificación = "";
$avisoCorreo = "";
$avisoValidacionCorreo="";
$avisoValidacionTelefono="";
$avisovalidacionContrasena="";

function sanitize_input($data) {
    return htmlspecialchars(trim($data));
}

// Función para validar el formato del correo electrónico
function is_valid_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) ? "" : "La dirección de correo electrónico no es válida.";
}

// Función para validar el formato del número de teléfono
function is_valid_phone($phone) {
    // Puedes personalizar esto según tus requisitos
    return preg_match("/^[0-9]{10}$/", $phone) ? "" : "El número de teléfono no es válido.";
}

// Función para validar la longitud de la contraseña
function is_valid_password($password) {
    // Puedes personalizar esto según tu política de contraseñas
    return strlen($password) >= 8 ? "" : "La contraseña no cumple con los requisitos mínimos. (8 Carácteres)";
}


function validarDatos($datos) {
    return (isset($datos["Nombres"]) &&
        isset($datos["Apellidos"]) &&
        isset($datos["TipoIdentificacion"]) &&
        isset($datos["Identificacion"]) &&
        isset($datos["Telefono"]) &&
        isset($datos["Correo"]) &&
        isset($datos["Contrasena"])
    );
}


$datos = false;
if (validarDatos($_POST)) {
    $nombres = sanitize_input($_POST["Nombres"]);
    $apellidos = sanitize_input($_POST["Apellidos"]);
    $tipoIdentificacion = sanitize_input($_POST["TipoIdentificacion"]);
    $identificacion = sanitize_input($_POST["Identificacion"]);
    $telefono = sanitize_input($_POST["Telefono"]);
    $correoelectronico = sanitize_input($_POST["Correo"]);
    $contrasena = sanitize_input($_POST["Contrasena"]);

    $validacionCorreo = is_valid_email($correoelectronico);
    $validacionTelefono = is_valid_phone($telefono);
    $validacionContrasena = is_valid_password($contrasena);

    if ($validacionCorreo === "" && $validacionTelefono === "" && $validacionContrasena === "") {
        $datos = true;
        
    } else {
        // Al menos una validación falló, mostrar el mensaje correspondiente
         $avisoValidacionCorreo=$validacionCorreo ; 
         $avisoValidacionTelefono = $validacionTelefono;   
         $avisovalidacionContrasena = $validacionContrasena; 
    }
}







if ($datos) {

    
    $contrasenahash = password_hash($contrasena, PASSWORD_DEFAULT);


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