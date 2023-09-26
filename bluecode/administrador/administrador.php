<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device=width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/styleAdm.css">
    <title>Administrador</title>
    <script src="scriptkeydown.js"></script>
</head>
<body>
    <header>
        <div class="encabezado">
            <h2 class="name-system">BlueCode</h2>
        </div>
        <nav>
            <a href="../inicio_sesion/login.php" class="nav-link">Iniciar Sesion</a>
            <a href="../inicio.php" class="nav-link">Registrarse</a>
        </nav>
        </nav>
    </header>
    <div class="subir">
        <form action="insertadm.php" method="POST"> 
          <h4>Registro</h4>
          <input class="controls" id= 'full-name'name="name" type="text" placeholder="Ingrese su nombre" onkeypress="nextFocus('full-name', 'correo')"/>
          <input class="controls" id= 'correo'name="correo" type="email" placeholder="Ingrese su correo"onkeypress="nextFocus('correo', 'codigo')"/>
          <input class="controls" id= 'codigo'name="codigo" required type="number" placeholder=" Ingrese el codigo de administrador"onkeypress="nextFocus('codigo', 'contraseña')" />
          <input class="controls" id= 'contraseña'name="contraseña" type="password" placeholder=" Ingrese su Contrase&ntilde;a" />
             <div class="terms">
               <label><input type="checkbox"> </label>
               <label for="terms"><a href="#"> Acepto los Terminos y Condiciones</a></label>
             </div>
          <input class="botom" type="submit" name="registro" value="Registrar">
          <p><a href="../inicio_sesion/login.php"> &iquest;Ya tienes una cuenta?</a></p>
        </form>
    </div>
</body>
</html>