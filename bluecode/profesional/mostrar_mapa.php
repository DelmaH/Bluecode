<?php include('validacionpanel_P.php');?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/stylemenu.css">
    <link rel="stylesheet" type="text/css" href="../css/styleUpdate.css">
    <title>Lamadas emergencia</title>
    <style>
        .map-container {
            text-align: center;
            margin-top: 100px; 
        }

        .map-container h1 {
            font-size: 24px;
        }
    </style>
</head>
<body>
    <?php include('menudesplegable_P.php'); ?>

    <div class="map-container">
        <h1>Ubicación del Paciente</h1>

        <?php
        // Verifica si se pasaron las coordenadas de latitud y longitud en la URL
        if (isset($_GET['latitud']) && isset($_GET['longitud'])) {
            $latitud = $_GET['latitud'];
            $longitud = $_GET['longitud'];

            // Reemplaza 'TU_API_KEY' con tu clave de API de Google Maps
            $api_key = 'AIzaSyCfzfADGPhwGxtsMpIczPg7CYeI2DdHJng';

            // Muestra un mapa con la ubicación del paciente utilizando Google Maps
            echo "<iframe
                width='800'
                height='600'
                frameborder='0' style='border:0; margin: 0 auto;'
                src='https://www.google.com/maps/embed/v1/place?key=$api_key&q=$latitud,$longitud' allowfullscreen>
                </iframe>";
        } else {
            echo "No se proporcionaron coordenadas de ubicación.";
        }
        ?>
    </div>
</body>
</html>
