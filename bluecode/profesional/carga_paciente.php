<?php include('validacionpanel_P.php');?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device=width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/stylemenu.css">
    <link rel="stylesheet" type="text/css" href="../css/styleCpac.css">
    

    <title>Cargar Paciente</title>
    <script src="../scriptkeydown.js"></script>
</head>
<body>
    <?php include('menudesplegable_P.php'); ?>

    <div class="create_pac">
        <form action="insert_pac.php" method="POST">
            <h4>Cargar datos paciente</h4>
            <input class="carga" id= 'nombre' name="nombre" type="text" placeholder="Ingrese nombre" onkeypress="nextFocus('nombre', 'dni')"/>
            <input class="carga" id= 'domic' name="dni" type="numer" placeholder="Ingrese DNI"onkeypress="nextFocus('dni', 'domic')"/> 
            <input class="carga" id= 'domic' name="domic" type="text" placeholder="Ingrese Domicilio"onkeypress="nextFocus('domic', 'cel')"/> 
            <input class="carga" id= 'cel' name="cel" type="number" placeholder="Ingrese el n° celular"onkeypress="nextFocus('cel', 'correo')"/>
            <input class="carga" id= 'mail' name="mail" type="text" placeholder="Ingrese el nombre de correo de paciente"onkeypress="nextFocus('correo', 'contraseña')"/>
            <input class="carga" id= 'contraseña'name="contraseña" type="password" placeholder=" Ingrese su Contrase&ntilde;a" />
            <input class="botom" type="submit" name="registro" value="Cargar">
        </form>
    </div>
</body>
</html>