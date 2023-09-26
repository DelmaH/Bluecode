<?php include('validacionpanel_A.php');?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device=width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/stylemenu.css">
    <link rel="stylesheet" type="text/css" href="../css/stylepanel_A.css">
    <title>Paciente</title>
</head>
<body>
    <?php include('menudesplegable_A.php'); ?>
    <div class="card">
        <div class="content">
             <?php echo $nombre ;
             if (isset($_GET['registro_exitoso']) && $_GET['registro_exitoso'] == 1) {
                echo '<h3 class="ok">Profesional registrado exitosamente.</h3>';
            }?>
        </div>
    </div>
</body>
</html>