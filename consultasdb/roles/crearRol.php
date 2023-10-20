<?php
require '../conexion.php';
$nombreRol = strtolower($_POST['nombreRol']);

$queryTodosLosRoles = "SELECT * FROM Roles WHERE nombreRol = ? ";
$stmt = $conn->prepare($queryTodosLosRoles);
$stmt->bind_param("s", $nombreRol);
$stmt->execute();
$result = $stmt->get_result();

if($result->fetch_assoc() < 1){
    $insertQuery = "INSERT INTO `Roles` (`nombreRol`) VALUES (?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("s", $nombreRol);
    
    if ($stmt->execute()) {
        // Insertion successful
        echo "success";
    } else {
        // Error in insertion
        echo "error";
    }
}else{
    echo "errorExiste";
}



$stmt->close();
$conn->close();
?>