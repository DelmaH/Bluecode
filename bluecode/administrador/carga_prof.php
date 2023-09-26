<?php include('validacionpanel_A.php');?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargar Profesional</title>
    <link rel="stylesheet" href="../css/stylemenu.css">
    <link rel="stylesheet" href="../css/styleCpac.css">
</head>
<body>
    <?php include('../administrador/menudesplegable_A.php'); ?>
    </div>
    <div class="create_pac">
        <form action="../profesional/insertProf.php" method="POST">
            <h4>Cargar Profesional</h4>
            <input type="hidden" name="tipo_registro" value="carga_administrador">
            <input class="carga" name="name" type="text" placeholder="Nombre" required>
            <input class="carga" name="domic" type="text" placeholder="Domicilio" required>
            <input class="carga" name="correo" type="email" placeholder="Correo Electrónico" required>
            <input class="carga" name="cel" type="number" placeholder="Celular" required>
            <label for="select">Rol</label>
            <select class="carga" name="select" id="select" required>
                <option value="Medico/a">Médico/a</option>
                <option value="Enfermero/a">Enfermero/a</option>
            </select>
            <input class="carga" name="contraseña" type="password" placeholder="Contraseña" required>
            <button class="botom" type="submit" name="registro">Registrar Profesional</button>
        </form>
    </div>
</body>
</html>