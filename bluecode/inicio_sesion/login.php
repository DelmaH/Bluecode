<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../css/styleS.css">
    <script src="../scriptkeydown.js"></script>
</head>
<body>
    <header>
        <div class="encabezado">
            <h2 class="name-system">BlueCode</h2>
        </div>
        <nav>
            <a href="../inicio.php" class="nav-link">Registrar</a>
        </nav>
    </header>
    </div>
    </div>
    <div class="form-login">
        <form action="validarS.php" class="sesion" method= "POST">
            <h4> Iniciar sesion</h4>
            <input class="iniciar" id='correo'name="correo" type="email" placeholder="Ingrese su correo"  onkeypress="nextFocus('correo', 'contraseña')"/>
            <input class="iniciar" id='contraseña'name="contraseña" type="password" placeholder=" Ingrese su contraseña" />
            <br><input class="botom" type="submit" value= Iniciar></input></br>
            <p><a href="../inicio.php">¿No tienes una cuenta? </a></p>
        </form>
    </div>
</body>
</html>