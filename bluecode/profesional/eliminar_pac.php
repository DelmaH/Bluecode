<?php
// Incluye la conexión a la base de datos
include("../cn.php");

// Verifica si se proporcionó un ID de paciente en la URL
if (isset($_GET['idpaciente']) && is_numeric($_GET['idpaciente'])) {
    $idPaciente = $_GET['idpaciente'];

    // Query para eliminar al paciente con el ID especificado
    $query = "DELETE FROM 7a_paciente WHERE idpaciente = '$idPaciente'";
    
    $result = mysqli_query($con, $query);

    if ($result) {
        // Redirige de vuelta a la página listar_pacientes.php después de eliminar
        header('Location: listar_paciente.php');
        exit;
    } else {
        // Maneja el error si la eliminación falla
        echo "Error al eliminar el paciente.";
    }
} else {
    echo "ID de paciente no proporcionado.";
}

// Cierra la conexión a la base de datos
mysqli_close($con);
?>