<?php
include("../cn.php");

if (isset($_POST["registro"])) {
    if (
        isset($_POST['tipo_registro']) &&
        strlen($_POST['name']) >= 1 &&
        strlen($_POST['domic']) >= 1 &&
        strlen($_POST['cel']) >= 1 &&
        strlen($_POST['select']) >= 1 &&
        strlen($_POST['contraseña']) >= 1
    ) {
        $tipo_registro = $_POST['tipo_registro'];
        $name = trim($_POST['name']);
        $domic = trim($_POST['domic']);
        $correo = trim($_POST['correo']);
        $cel = $_POST['cel'];
        $rol = $_POST['select'];
        $contraseña = trim($_POST['contraseña']);
        $contraseña_hash = password_hash($contraseña, PASSWORD_DEFAULT); //cifrado de contraseña generada de forma automatica

        mysqli_query($con, "SET FOREIGN_KEY_CHECKS=0");

        if ($tipo_registro === 'registro_manual') {
            // Registro manual de profesional
            $consulta = "INSERT INTO 7a_profesional (nombre, celular, domicilio, rol, email, contraseña) VALUES ('$name','$cel', '$domic', '$rol','$correo','$contraseña_hash')";
        } elseif ($tipo_registro === 'carga_administrador') {
            // Carga de profesional por administrador
            $consulta = "INSERT INTO 7a_profesional (nombre, celular, domicilio, rol, email, contraseña) VALUES ('$name','$cel', '$domic', '$rol','$correo','$contraseña_hash')";
        }

        $resultado = mysqli_query($con, $consulta);
        mysqli_query($con, "SET FOREIGN_KEY_CHECKS=1");

        if ($resultado) {
            if ($tipo_registro === 'carga_administrador') {
                session_start();
                $_SESSION['idadministrador'] = $idAdministrador;
                echo $idAdministrador;
                header("Location: ../administrador/carga_prof.php");
                echo 'el registro fue exitoso';
            } elseif ($tipo_registro === 'registro_manual') {
                header("Location: panel_Prof.php");
                echo 'el registro fue exitoso';
            }
            exit;
        } else {
            echo "Ocurrió un error";
        }
    } else {
        echo "Por favor complete los campos";
    }
}

mysqli_close($con);
?>
