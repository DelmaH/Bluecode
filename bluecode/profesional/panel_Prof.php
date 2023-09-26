<?php include('validacionpanel_P.php');?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device=width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/stylepanel_P.css">
    <link rel="stylesheet" type="text/css" href="../css/stylemenu.css">
    <title>Panel_Prof</title>
</head>
<body>
    <?php include('menudesplegable_P.php'); ?>
    <div class="card">
        <div class="content">
             <?php echo $nombre ;?>
        </div>
        <div class="content1">
             <?php echo $domic ;?>
        </div>
        <div class="content3">
             <?php echo $rol ;?>
        </div>
        <div class="content4">
             <?php echo $correo ;?>
        </div>
    </div>

</body>
</html>