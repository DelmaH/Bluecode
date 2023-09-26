<?php
include("../cn.php");

if (isset($_GET['idprofesional'])) {
    $idProfesional = $_GET['idprofesional'];
    // Realiza la consulta SQL para eliminar el profesional con el ID dado
    $consulta = "DELETE FROM 7a_profesional WHERE idprofesional = $idProfesional";
    $resultado = mysqli_query($con, $consulta);

    if ($resultado) {
        // Redirige de nuevo a la página de listar profesionales después de eliminar
        header('Location: listar_prof_Adm.php');
        exit();
    } else {
        echo "Error al eliminar el profesional.";
    }
} else {
    echo "ID de profesional no proporcionado.";
}
?>