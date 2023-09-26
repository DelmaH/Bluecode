<?php
$nombre = $_POST['nombre'];
$mail = $_POST['mail'];
$contraseña = $_POST['contraseña']; 
$foto = $_FILES['foto'];

require_once '../cn.php';

session_start();
$idAdministrador = $_SESSION['id'];

$nombreArchivo = $foto['name'];
$tipoArchivo = $foto['type'];
$datosArchivo = file_get_contents($foto['tmp_name']);
$rutaCarpeta = '../img_perf/';
$rutaArchivo = $rutaCarpeta . $nombreArchivo;

// Verificar la conexión
if ($con->connect_error) {
  die('Error en la conexión: ' . $con->connect_error);
}
$stmt = $con->prepare("SELECT contraseña FROM 7a_administrador WHERE idadministrador = ?");
$stmt->bind_param("i", $idAdministrador);
$stmt->execute();
$result = $stmt->get_result();
$administrador = $result->fetch_assoc();
$contraseña_actual = $administrador['contraseña'];

if (!empty($contraseña) && $contraseña !== $contraseña_actual) {
    // Se proporciona una nueva contraseña y es diferente de la actual
    $contraseña_hash = password_hash($contraseña, PASSWORD_DEFAULT);
    // Luego, actualiza la contraseña en la base de datos
    $stmt = $con->prepare("UPDATE 7a_administrador SET contraseña = ? WHERE idadministrador = ?");
    $stmt->bind_param("si", $contraseña_hash, $idAdministrador);
    if ($stmt->execute()) {
        echo "La contraseña se ha actualizado exitosamente";
        header('location:perfilAdm.php ');
    } else {
        echo "Error al actualizar la contraseña: " . $stmt->error;
    }
} 

$stmt = $con->prepare("UPDATE 7a_administrador SET nombre = ?, email = ?, foto = ? WHERE idadministrador = ?");
$stmt->bind_param("sssi", $nombre, $mail, $rutaArchivo, $idAdministrador);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Los cambios se han guardado exitosamente";
    header('Location: perfilAdm.php');
}else {
    echo "Error al guardar los cambios: " . $stmt->error;
}

// Cerrar la conexión
$stmt->close();
$con->close();
 // Mover la imagen a la ubicación deseada 
 if (move_uploaded_file($foto['tmp_name'], $rutaArchivo)) {
  header('Location: perfilAdm.php');
  echo $rutaArchivo;
 } else {
    echo "Error al guardar la imagen en la carpeta.";
  }