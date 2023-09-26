<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: ../inicio_sesion/login.php");
    exit();
}

require_once '../cn.php';
$idProfesional = $_SESSION['id'];

// Verificar la conexión a la base de datos
if (!$con) {
    die("Error de conexión: " . mysqli_connect_error());
}

$sql = "SELECT * FROM 7a_profesional WHERE idprofesional = '$idProfesional'";
$result = mysqli_query($con, $sql);

// Verificar si la consulta se ejecutó correctamente
if (!$result) {
    die("Error de consulta: " . mysqli_error($con));
}

// Mostrar los datos en el perfil
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nombre = $row['nombre'];
    $celular = $row['celular'];
    $domic = $row['domicilio'];
    $rol = $row['rol'];
    $correo = $row['email'];
    $contraseña = $row['contraseña'];
    $foto = $row['foto'];

} else {
    echo "No se encontraron resultados para el ID de Profesional: $idProfesional";
}

// Cerrar la conexión a la base de datos
mysqli_close($con);
?>
