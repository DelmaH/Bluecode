<?php
session_start();
if (isset($_POST['correo']) && isset($_POST['contraseña'])) {
    $correo = trim($_POST['correo']);
    $contraseña = trim($_POST['contraseña']);

    // Realizar la autenticación en la base de datos 'bluecode'
    include('../cn.php');
    // Verificar si las credenciales coinciden con un profesional
    $consultaProfesional = "SELECT idprofesional, contraseña FROM 7a_profesional WHERE email = '$correo'";
    $resultadoProfesional = mysqli_query($con, $consultaProfesional);

    if (mysqli_num_rows($resultadoProfesional) == 1) {
        $filaProfesional = mysqli_fetch_assoc($resultadoProfesional);
        $contraseña_hash = $filaProfesional['contraseña'];

        if (password_verify($contraseña, $contraseña_hash)) {
            $_SESSION['id'] = $filaProfesional['idprofesional'];
            header("Location: ../profesional/panel_Prof.php"); // Redirige al panel de profesional
            exit();
        }
    }

    // Verificar si las credenciales coinciden con un administrador
    $consultaAdministrador = "SELECT idadministrador, contraseña FROM 7a_administrador WHERE email = '$correo'";
    $resultadoAdministrador = mysqli_query($con, $consultaAdministrador);

    if (mysqli_num_rows($resultadoAdministrador) == 1) {
        $filaAdministrador = mysqli_fetch_assoc($resultadoAdministrador);
        $contraseña_hash = $filaAdministrador['contraseña'];

        if (password_verify($contraseña, $contraseña_hash)) {
            $_SESSION['id'] = $filaAdministrador['idadministrador'];
            header("Location: ../administrador/panel_Adm.php"); // Redirige al panel de administrador
            exit();
        }
    }

    // Verificar si las credenciales coinciden con un paciente
    $consultaPaciente = "SELECT idpaciente, contraseña FROM 7a_paciente WHERE email = '$correo'";
    $resultadoPaciente = mysqli_query($con, $consultaPaciente);

    if (mysqli_num_rows($resultadoPaciente) == 1) {
        $filaPaciente = mysqli_fetch_assoc($resultadoPaciente);
        $contraseña_hash = $filaPaciente['contraseña'];

        if (password_verify($contraseña, $contraseña_hash)) {
            $_SESSION['id'] = $filaPaciente['idpaciente'];
            header("Location: ../paciente/panel_Paciente.php"); // Redirige al panel de paciente
            exit();
        }
    }
}
    // Si no coincide con ningún usuario, mostrar mensaje de error
    echo "Correo electrónico o contraseña incorrectos.";

    // Cierra la conexión a la base de datos
    mysqli_close($con);
?>