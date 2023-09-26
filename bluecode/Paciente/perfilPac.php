<?php include('validacionpanel_Pac.php');?>
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
    <div class="contenedor">
        <div class="btn-menu">  
            <label for="btn-menu" class="icon-menu">&#9776</label> 
        </div>
        <div class="encabezado">
            <h2 class="name-system">BlueCode</h2>
        </div>
    </div>
    <input type="checkbox" id="btn-menu">
        <div class="container-menu">
            <div class="cont-menu">
                <div class="img-opc">
                    <div class="all">
                        <div class="img_perf">
                            <img class="imgperfil" src="<?php  echo $row['foto'] ?>" alt="foto de perfil">  
                        </div>
                    </div>
                    <nav>
                        <a href="panel_Paciente.php">Llamada Emergencia</a>
                        <a href="perfilPac.php">Perfil</a>
                        <a href="#">Ficha Medica</a>
                        <a href="../inicio_sesion/logout.php">Cerrar sesión</a>
                    </nav>
                </div>
                <label for="btn-menu">✖️</label>
            </div>
        </div>

    <div class="cont_perfil">
        <h2>Perfil</h2>
        <form action="UpdatePerf_Pac.php" method="POST" enctype="multipart/form-data">
            <label for="nombre">Nombre:</label>
            <div class="form-group">
                <?php echo $nombre; ?>
            </div>

            <label for="dni">DNI:</label>
            <div class="form-group">
                <?php echo $dni; ?>
            </div>

            <label for="domicilio">Domicilio:</label>
            <input type="text" id="domicilio" name="domicilio" value="<?php echo $row['domicilio']?>">

            <label for="cel">celular:</label>
            <input type="bigint" id="celular" name="celular" value="<?php echo $row['celular']?>">

            <label for="email">Email:</label>
            <div class="form-group">
                <?php echo $mail; ?>
            </div>

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