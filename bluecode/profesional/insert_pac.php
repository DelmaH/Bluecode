<?php
include('../cn.php');
if(isset($_POST["registro"])){
    $dominiomail= '@codeblue.com';   
    if(strlen($_POST['nombre'])>= 1 && strlen($_POST['domic'])>= 1 && strlen($_POST['dni'])>= 1 && strlen($_POST['cel'])>= 1 && strlen($_POST['mail'])>= 1 && strlen($_POST['contraseña'])>= 1 ){
        $nombre=$_POST['nombre'];
        $dni=$_POST['dni'];
        $domic=$_POST['domic'];
        $cel=$_POST['cel'];
        $correo =  $_POST['mail'] .$dominiomail; 
        $contraseña=$_POST['contraseña'];
        $contraseña_hash = password_hash($contraseña, PASSWORD_DEFAULT);
        mysqli_query($con, "SET FOREIGN_KEY_CHECKS=0");
        $cons= "INSERT INTO 7a_paciente(nombre, dni, domicilio, celular, email, contraseña) VALUES ('$nombre', '$dni', '$domic','$cel','$correo','$contraseña_hash')";
       

        if(mysqli_query($con, $cons)){
            $last_id = mysqli_insert_id($con); // Obtener el idpaciente generado
            echo 'id de paciente es:' . $last_id;
            mysqli_query($con, "SET FOREIGN_KEY_CHECKS=1");
            session_start();
            if (isset($_SESSION['id'])) {
                $idProfesional = $_SESSION['id'];
                // Insertar la asignación en la tabla 7a_asignacion_profesional
                $consAsignacion = "INSERT INTO 7a_asignacion_profesional (idprofesional, idpaciente) VALUES ('$idProfesional', '$last_id')";
                $resultAsignacion = mysqli_query($con, $consAsignacion);

                if ($resultAsignacion) {
                    header('Location:carga_paciente.php');
                    exit();
                } else {
                    // Hubo un error al insertar la asignación
                    ?>
                    <h3 class="bad">Ocurrió un error al insertar la asignación</h3>
                    <?php
                }
            } else{
                ?>
                <h3 class="bad">No se encontró la información del profesional en la sesión</h3>
                <?php
            }
    } else {
            ?>
            <h3 class="bad">Ocurrió un error al registrar al paciente</h3>
            <?php
    }
} else{
        ?>
        <h3 class="bad">Por favor complete los campos</h3>
        <?php
    }
}
mysqli_close($con);
?>