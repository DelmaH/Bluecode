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
    margin-bottom:-40px;
}
.imgperfil{
    border-radius: 45%;
    width: 90px;
    height: 80px;
}
</style>
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
                            <a href="mostrar_mapa.php">Llamadas pacientes</a>    
                            <a href="../profesional/panel_prof.php">Cargar llamada</a>
                            <a href="carga_paciente.php">Cargar Paciente</a>
                            <a href="listar_paciente.php">Lista pacientes</a>
                            <a href="#">Ficha Medica</a>
                            <a href="perfProf.php">Perfil</a>
                            <a href="../inicio_sesion/logout.php">Cerrar sesión</a>
                        </nav>
                </div>
                <label for="btn-menu">✖️</label>
            </div>
        </div>