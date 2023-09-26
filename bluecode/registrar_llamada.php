<?php
session_start();
$idPaciente = $_SESSION['id'];

include('cn.php');
header("Content-Type: application/json");

// Obtener los datos enviados por JavaScript
$data = json_decode(file_get_contents("php://input"));
if ($data) {
    if (!$con) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    $latitud = mysqli_real_escape_string($con, $data->latitud);
    $longitud = mysqli_real_escape_string($con, $data->longitud);
    $tipo_llamada = mysqli_real_escape_string($con, $data->tipo_llamada);


    // Consultar si la ubicación ya existe en la tabla 7a_area
    $consultaArea = "SELECT idarea FROM 7a_area WHERE latitud = '$latitud' AND longitud = '$longitud'";
    $resultadoArea = mysqli_query($con, $consultaArea);

    if ($resultadoArea && mysqli_num_rows($resultadoArea) > 0) {
        $rowArea = mysqli_fetch_assoc($resultadoArea);
        $idArea = $rowArea['idarea'];
    } else {
        // Si la ubicación no existe, inserta una nueva fila en la tabla 7a_area
        $insertarArea = "INSERT INTO 7a_area (latitud, longitud) VALUES ('$latitud', '$longitud')";
        if (mysqli_query($con, $insertarArea)) {
            // Obtiene el ID recién insertado
            $idArea = mysqli_insert_id($con);
        } else {
            $response = ["success" => false];
            mysqli_close($con);
            header("Content-Type: application/json");
            echo json_encode($response);
            exit();
        }
    }

    // Inserta la llamada de emergencia con el ID de área obtenido
    $sql = "INSERT INTO 7a_llamada (idarea, idpaciente, tipo_llamada, hora_llamada)
            VALUES ('$idArea', '$idPaciente', '$tipo_llamada', NOW())";

    if (mysqli_query($con, $sql)) {
        $response = ["success" => true];
    } else {
        $response = ["success" => false];
    }

    mysqli_close($con);
} else {
    $response = ["success" => false];
}
echo json_encode($response);
?>