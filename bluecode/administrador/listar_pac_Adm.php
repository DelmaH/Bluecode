<?php include('validacionpanel_A.php');?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/stylemenu.css">
    <link rel="stylesheet" type="text/css" href="../css/stylelistarpac.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Listar Pacientes</title>
</head>
<body>
    
    <?php include('menudesplegable_A.php'); ?>

    <div class="container">
        <h3>Listado de Pacientes</h3>
        
        <!-- Agregar un formulario de búsqueda -->
        <form action="listar_pac_Adm.php" method="GET" class="search-form">
            <input type="text" name="search" placeholder="Buscar por nombre">
            <button type="submit">Buscar</button>
        </form>
        
        <!-- Mostrar la lista de pacientes -->
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>DNI</th>
                    <th>Domicilio</th>
                    <th>Celular</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Incluye la conexión a la base de datos
                include("../cn.php");
                
                // Consulta SQL para listar pacientes desde la tabla "7a_paciente"
                $search = "";
                if (isset($_GET['search'])) {
                    $search = $_GET['search'];
                    $query = "SELECT * FROM 7a_paciente WHERE nombre LIKE '%$search%' ORDER BY nombre";
                } else {
                    $query = "SELECT * FROM 7a_paciente ORDER BY nombre";
                }
                
                $result = mysqli_query($con, $query);
                
                if (!$result) {
                    die("Error de consulta: " . mysqli_error($con));
                }
                
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['nombre']}</td>";
                    echo "<td>{$row['dni']}</td>";
                    echo "<td>{$row['domicilio']}</td>";
                    echo "<td>{$row['celular']}</td>";
                    echo "<td>{$row['email']}</td>";
                    echo "<td><a href='../Paciente/eliminar_pac.php?idpaciente={$row['idpaciente']}'><i class='fas fa-trash-alt'></i></a> <a href='../Paciente/update_pac.php?idpaciente={$row['idpaciente']}'><i class='fas fa-pencil-alt'></i></a></td>";
                    echo "</tr>";
                }
                
                // Cerrar la conexión a la base de datos
                mysqli_close($con);
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>