<link rel="stylesheet" href="css/barraNavegacion.css">
<nav class="navbar">
        <div class="hamburger-menu">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <ul class="nav-list">
            <li class="nav-item">
                <img src="img/doctor.png" class="img" alt="">
                <ul class="sub-menu">
                    <li><a href="paginaPrincipal.php">Pagina Principal</a></li>
                    <li><a href="cambiarPerfil.php">Cambiar de Perfil</a></li>
                    <li><a href="cerrarSesion.php">Cerrar Sesion</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <strong>Archivo</strong>
                <ul class="sub-menu">
                    <li><a href="configuracionGeneral.php">Configuración General</a></li>
                    <li><a href="">Ticket</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <strong>Pacientes</strong>
                <ul class="sub-menu">
                    <li><a href="pacientes.php">Archivos de Pacientes</a></li>
                    <li><a href="">Nuevo Paciente</a></li>
                    <li><a href="">Antecedentes</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <strong>Consultorio</strong>
                <ul class="sub-menu">
                    <li><a href="paginaPrincipal.php">Citas</a></li>
                    <li><a href="">Recetas</a></li>
                    <li><a href="">Orden de Estudios</a></li>
                </ul>
            </li>
        </ul>
        <div class="busqueda">
            <input type="text" placeholder="Buscar">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#F6F1F1" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                <path d="M21 21l-6 -6" />
            </svg>
        </div>
    </nav>