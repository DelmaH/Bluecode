<?php include('validacionpanel_A.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/styleUpdate.css">
    <link rel="stylesheet" type="text/css" href="../css/stylemenu.css">
    <title>Perfil</title>
</head>
<body>
    <?php include('menudesplegable_A.php'); ?>

    <div class="cont_perfil">
        <h2>Perfil</h2>
        <form action="updateperf_Adm.php" method="POST" enctype="multipart/form-data">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $row['nombre']?>">

            <label for="email">Email:</label>
            <input type="email" id="mail" name="mail" value="<?php echo $row['email']?>">

            <span>foto:</span>
            <div class="form-group">
                <input type="file" id="foto" name="foto">
            </div>

            <label for="contraseña">Contraseña:</label>
            <input type="password" id="contraseña" name="contraseña" value="<?php echo $row['contraseña']?>">

            <button type="submit" name="submit">Actualizar</button>
        </form>
    </div>
</body>
</html>