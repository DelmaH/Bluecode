<?php include('validacionpanel_Pac.php');?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device=width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/stylemenu.css">
    <link rel="stylesheet" type="text/css" href="../css/stylePaciente.css">
    <title>Paciente</title>
    <script src="../accionalarma.js"></script>
    <style>
        .all{
            display: grid;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
        }
        .img_perf{
            justify-content: center;
            align-items: center;
            margin-top: 15px;
            width: 90px;
            height: 80px;
            margin-bottom:-15px;
        }
        .imgperfil{
            border-radius: 45%;
            width: 90px;
            height: 80px;
        }
    </style>
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
                        <a href="perfilPac.php">Perfil</a>
                        <a href="#">Ficha Medica</a>
                        <a href="../inicio_sesion/logout.php">Cerrar sesión</a>
                    </nav>
                </div>
                <label for="btn-menu">✖️</label>
            </div>
        </div>
    <div class="content">
        <?php echo $nombre ;?>
        <?php echo $mail ;?>
    </div>
    <div class="llamadaemergencia" >
            <button id="btnLlamadaEmergencia">Llamar de Emergencia</button>
            <button id="btnGeolocalizar">Activar Geolocalización</button>
            <div id="resultadoGeolocalizacion"></div>
    </div>
</body>
</html>