<?php include('validacionpanel_P.php');?>
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
    <?php include('menudesplegable_P.php'); ?>

    <div class="cont_perfil">
        <h2>Perfil</h2>
        <form action="updateperf_Prof.php" method="POST" enctype="multipart/form-data">
            <label for="nombre">Nombre:</label>
            <div class="form-group">
                <?php echo $nombre; ?>
            </div>
            <label for="celular">celular:</label>
            <input type="number" id="celular" name="celular" value="<?php echo $row['celular']?>">

            <label for="domic">domicilio:</label>
            <input type="text" id="domicilio" name="domicilio" value="<?php echo $row['domicilio']?>">

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
            <input type="email" id="email" name="email" value="<?php echo $correo; ?>" required>

            <span>foto:</span>
            <div class="form-group">
                <input type="file" id="foto" name="foto">
            </div>

            <label for="contraseña">Contraseña:</label>
            <input type="password" id="contraseña" name="contraseña" value="<?php echo $row['contraseña']; ?>" required>

            <button class="update-button" type="submit" name="submit">Actualizar</button>
        </form>
    </div>
</body>
</html>