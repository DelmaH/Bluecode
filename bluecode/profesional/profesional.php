<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device=width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/styleprof.css">
    <title>Paciente</title>
    <script src="../scriptkeydown.js"></script>
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
        <form action="insertProf.php" method="POST"> 
          <h4>Registro</h4>
          <input type="hidden" name="tipo_registro" value="registro_manual">
          <input class="control" id= 'name'name="name" type="text" placeholder="Ingrese su nombre" onkeypress="nextFocus('full-name', 'domic')"/>
          <input class="control" id= 'domic'name="domic" type="text" placeholder="Ingrese su domicilio" onkeypress="nextFocus('domic', 'correo')"/>
          <input class="control" id= 'correo'name="correo" type="email" placeholder="Ingrese su correo"onkeypress="nextFocus('correo', 'cel')"/>
          <input class="control" id= 'cel'name="cel" type="number" placeholder=" Ingrese su Telefono"onkeypress="nextFocus('cel', 'contraseña')"/>
          <select name="select" class="control">
            <option id= 'rol'name="rol" type="text" value="Enfermero/a" onkeypress="nextFocus('rol', 'contraseña')">Enfermero/a</option>
            <option id= 'rol'name="rol" type="text" value="Medico/a" selected>Doctor/a</option>
          </select>
          <input class="control" id= 'contraseña'name="contraseña" type="password" placeholder=" Ingrese su Contrase&ntilde;a" />
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