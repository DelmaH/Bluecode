<?php
include("../cn.php");

if(isset($_POST["registro"])){
    if(strlen($_POST['name'])>= 1 && strlen($_POST['correo'])>= 1 && strlen($_POST['contraseña'])>= 1) {
        $name= trim($_POST['name']);
        $correo= trim($_POST['correo']);
        $contraseña= trim($_POST['contraseña']);
        $codigo_adm= $_POST['codigo'];
        $contraseña= trim($_POST['contraseña']);
        $contraseña_hash = password_hash($contraseña, PASSWORD_DEFAULT);

        $codigo = "2619"; 

        if($codigo_adm == $codigo){
        mysqli_query($con, "SET FOREIGN_KEY_CHECKS=0");
        $consulta= "INSERT INTO 7a_administrador(nombre, email, contraseña) VALUES ('$name','$correo','$contraseña_hash')";
        $resultado= mysqli_query($con, $consulta);
        mysqli_query($con, "SET FOREIGN_KEY_CHECKS=1");

            if($resultado){
                ?>
                <h3 class= "ok"> Te registraste correctamente </h3>
                <?php
                $idAdministrador = mysqli_insert_id($con);
                session_start();
                $_SESSION['idadministrador'] = $idAdministrador;
                header('Location:panel_Adm.php');
                exit(); 
            } else{
                
                echo '<h3 class= "bad"> Ocurrio un error </h3>';            
            }
        } else {
             echo '<h3 class="bad">Usted no está permitido registrarse como profesional</h3>';
        }
    }  else{
            echo '<h3 class= "bad"> Por favor complete los campos </h3>';
        }
}
?>