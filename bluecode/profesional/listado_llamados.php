<?php include('validacionpanel_P.php');?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listado de Llamados</title>
    <!-- Agrega aquí los enlaces a tus hojas de estilo CSS si es necesario -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .llamado-box {
            background-color: #f7f7f7;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            margin: 15px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .llamado-box h2 {
            margin: 0;
            color: #007bff;
        }

        .llamado-box p {
            margin: 5px 0;
            color: #333;
        }

        .map-link {
            display: block;
            text-decoration: none;
            color: #007bff;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Listado de Llamados</h1>
    <?php
    // Incluye el archivo de conexión
    include '../cn.php';

    // Consulta para obtener los datos de los llamados y pacientes
    $sql = "SELECT l.*, p.nombre AS nombre_paciente, p.email AS email_paciente, p.dni AS dni_paciente, a.latitud, a.longitud
            FROM 7a_llamada l
            INNER JOIN 7a_paciente p ON l.idpaciente = p.idpaciente
            INNER JOIN 7a_area a ON l.idarea = a.idarea";

    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="llamado-box">';
            echo "<h2>Llamado de " . $row["nombre_paciente"] . "</h2>";
            echo "<p>Email: " . $row["email_paciente"] . "</p>";
            echo "<p>DNI: " . $row["dni_paciente"] . "</p>";
            echo '<a class="map-link" href="mostrar_mapa.php?latitud=' . $row["latitud"] . '&longitud=' . $row["longitud"] . '" target="_blank">Ver ubicación en mapa <i class="fas fa-map-marker-alt"></i></a>';
            echo '</div>';
        }
    } else {
        echo "No se encontraron llamados.";
    }

    // Cierra la conexión
    mysqli_close($con);
    ?>
</body>
</html>
