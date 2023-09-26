<?php
include('../cn.php');

// Verificar si se ha enviado un ID de profesional válido a través de la URL
if (isset($_GET['idprofesional']) && is_numeric($_GET['idprofesional'])) {
    $idprofesional = $_GET['idprofesional'];

    // Consulta SQL para obtener los datos del profesional
    $query = "SELECT * FROM 7a_profesional WHERE idprofesional = $idprofesional";
    $result = mysqli_query($con, $query);

    if ($result) {
        // Verificar si se encontraron resultados
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $nombre = $row['nombre'];
            $celular = $row['celular'];
            $domicilio = $row['domicilio'];
            $rol = $row['rol'];
            $email = $row['email'];
        } else {
            echo "No se encontraron resultados para el ID de profesional: $idprofesional";
            exit();
        }
    } else {
        die("Error de consulta: " . mysqli_error($con));
    }
} else {
    echo "ID de profesional no válido.";
    exit();
}

// Procesar el formulario cuando se envía
if (isset($_POST['submit'])) {
    $nombre_nuevo = $_POST['nombre'];
    $celular_nuevo = $_POST['celular'];
    $domicilio_nuevo = $_POST['domicilio'];
    $rol_nuevo = $_POST['rol'];
    $email_nuevo = $_POST['email'];

    // Consulta SQL para actualizar los datos del profesional
    $update_query = "UPDATE 7a_profesional SET nombre = '$nombre_nuevo', celular = '$celular_nuevo', domicilio = '$domicilio_nuevo', rol = '$rol_nuevo', email = '$email_nuevo' WHERE idprofesional = $idprofesional";

    $update_result = mysqli_query($con, $update_query);

    if ($update_result) {
        // Redirigir al listado de profesionales después de la actualización
        header('Location:listar_prof_Adm.php');
        exit();
    } else {
        echo "Error al actualizar los datos del profesional: " . mysqli_error($con);
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
    <title>Actualizar Profesional</title>
</head>
<body>
    
    <?php include('menudesplegable_A.php'); ?>
    
    <div class="container">
        <h2>Actualizar Datos del Profesional</h2>
        <form action="update_prof.php?idprofesional=<?php echo $idprofesional; ?>" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required>

            <label for="celular">Celular:</label>
            <input type="number" id="celular" name="celular" value="<?php echo $celular; ?>" required>

            <label for="domicilio">Domicilio:</label>
            <input type="text" id="domicilio" name="domicilio" value="<?php echo $domicilio; ?>" required>

            <div class="rol-selection">
                <label>Seleccionar Rol:</label>
                <div class="rol-options">
                    <label class="rol-button">
                        <input type="radio" id="medico" name="rol" value="Médico/a" <?php if ($rol === "Médico/a") echo "checked"; ?>>
                        Médico/a
                    </label>
                    <label class="rol-button">
                        <input type="radio" id="enfermero" name="rol" value="Enfermero/a" <?php if ($rol === "Enfermero/a") echo "checked"; ?>>
                        Enfermero/a
                    </label>
                </div>
            </div>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>

            <button class="update-button" type="submit" name="submit">Actualizar</button>
        </form>
    </div>
</body>
</html>
