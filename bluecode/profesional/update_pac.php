<?php
include('validacionpanel_P.php');
include('../cn.php');

// Verificar si se ha enviado un ID de paciente válido a través de la URL
if (isset($_GET['idpaciente']) && is_numeric($_GET['idpaciente'])) {
    $idpaciente = $_GET['idpaciente'];

    // Consulta SQL para obtener los datos del paciente
    $query = "SELECT * FROM 7a_paciente WHERE idpaciente = $idpaciente";
    $result = mysqli_query($con, $query);

    if ($result) {
        // Verificar si se encontraron resultados
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $nombre = $row['nombre'];
            $dni = $row['dni'];
            $domicilio = $row['domicilio'];
            $celular = $row['celular'];
            $email = $row['email'];
        } else {
            echo "No se encontraron resultados para el ID de paciente: $idpaciente";
            exit();
        }
    } else {
        die("Error de consulta: " . mysqli_error($con));
    }
} else {
    echo "ID de paciente no válido.";
    exit();
}

// Procesar el formulario cuando se envía
if (isset($_POST['submit'])) {
    $nombre_nuevo = $_POST['nombre'];
    $dni_nuevo = $_POST['dni'];
    $domicilio_nuevo = $_POST['domicilio'];
    $celular_nuevo = $_POST['celular'];
    $email_nuevo = $_POST['email'];

    // Consulta SQL para actualizar los datos del paciente
    $update_query = "UPDATE 7a_paciente SET nombre = '$nombre_nuevo', dni = $dni_nuevo, domicilio = '$domicilio_nuevo', celular = $celular_nuevo, email = '$email_nuevo' WHERE idpaciente = $idpaciente";

    $update_result = mysqli_query($con, $update_query);

    if ($update_result) {
        // Redirigir al listado de pacientes después de la actualización
        header("Location: listar_paciente.php");
        exit();
    } else {
        echo "Error al actualizar los datos del paciente: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/stylemenu.css">
    <link rel="stylesheet" type="text/css" href="../css/styleUpdate.css">
    <title>Actualizar Paciente</title>
</head>
<body>
    
    <?php include('../profesional/menudesplegable_P.php'); ?>
    
    <div class="container">
        <h2>Actualizar Datos del Paciente</h2>
        <form action="update_pac.php?idpaciente=<?php echo $idpaciente; ?>" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required>

            <label for="dni">DNI:</label>
            <input type="number" id="dni" name="dni" value="<?php echo $dni; ?>" required>

            <label for="domicilio">Domicilio:</label>
            <input type="text" id="domicilio" name="domicilio" value="<?php echo $domicilio; ?>" required>

            <label for="celular">Celular:</label>
            <input type="number" id="celular" name="celular" value="<?php echo $celular; ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>

            <button type="submit" name="submit">Actualizar</button>
        </form>
    </div>
</body>
</html>
