<?php
include('validacionpanel_A.php');
include("../cn.php");

// Consulta SQL para seleccionar todos los profesionales
$consulta = "SELECT * FROM 7a_profesional";
$resultados = mysqli_query($con, $consulta);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Profesionales</title>
    <link rel="stylesheet" href="../css/stylemenu.css">
    <link rel="stylesheet" href="../css/stylelistarpac.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <?php include('menudesplegable_A.php'); ?>

    <div class="container">
        <h3>Listado de Profesionales</h3>

        <!-- Agregar un formulario de búsqueda -->
        <form action="listar_prof_Adm.php" method="GET" class="search-form">
            <input type="text" name="search" placeholder="Buscar por nombre">
            <button type="submit">Buscar</button>
        </form>

        <!-- Mostrar la lista de profesionales -->
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Celular</th>
                    <th>Domicilio</th>
                    <th>Rol</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Incluye la conexión a la base de datos
                include("../cn.php");

                // Consulta SQL para listar profesionales desde la tabla "7a_profesional"
                $search = "";
                if (isset($_GET['search'])) {
                    $search = $_GET['search'];
                    $query = "SELECT * FROM 7a_profesional WHERE nombre LIKE '%$search%' ORDER BY nombre";
                } else {
                    $query = "SELECT * FROM 7a_profesional ORDER BY nombre";
                }

                $result = mysqli_query($con, $query);

                if (!$result) {
                    die("Error de consulta: " . mysqli_error($con));
                }

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['nombre']}</td>";
                    echo "<td>{$row['celular']}</td>";
                    echo "<td>{$row['domicilio']}</td>";
                    echo "<td>{$row['rol']}</td>";
                    echo "<td>{$row['email']}</td>";
                    echo "<td><a href='eliminar_prof.php?idprofesional={$row['idprofesional']}'><i class='fas fa-trash-alt'></i></a> <a href='update_prof.php?idprofesional={$row['idprofesional']}'><i class='fas fa-pencil-alt'></i></a></td>";
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