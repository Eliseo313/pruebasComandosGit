<?php
include('includes/funciones.php');
include('includes/database2.php');
include('includes/config.php');

$db = conectarBD2('prueba__cisco_1');

$sesionIniciada = estaAutentincado();

if (!$sesionIniciada ) {
    header('Location:'.$ruta.'/');
}

if($_SESSION['perfil'] == ''){
    header('Location:'.$ruta.'/perfiles.php');
}

$detallesPerfil = obtenerDetallesPerfil($db,$_SESSION['idPerfil']);

date_default_timezone_set('America/Mexico_City');
$fechaActual = obtenerFechaActual();
$fechaFoemateada = obtenerFechaFormateada();
$horaFormateada = obtenerHoraFormateada();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida</title>
    <link rel="stylesheet" href="css/bienvenida.css">
</head>
<body>
    <header class="header">
        <h1><?php echo $horaFormateada ?></h1>
        <p><?php echo $fechaFoemateada ?></p>
    </header>

    <main>
        <div class="contenedor">
            <img class="img" src="img/doctor.png" alt="">
            <svg xmlns="http://www.w3.org/2000/svg" class="circulo icon icon-tabler icon-tabler-circle" width="230" height="230" viewBox="0 0 24 24" stroke-width="0.5" stroke="#F6F1F1" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
            </svg>
        </div>
        
        <section>
            <h2> <?php echo $detallesPerfil[0]['nombreDetPerf']. ' ' . $detallesPerfil[0]['aPaternoDetPerf']; ?> </h2>
            <div class="correo">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#146C94" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" />
                    <path d="M3 7l9 6l9 -6" />
                </svg>
                <p> <?php  echo $_SESSION['correoPerfil'];?> </p>
            </div>
        </section>
        <section>
            <a href="paginaPrincipal.php">
                <button class="btn">Comenzar</button>
            </a>
        </section>
        
        
    </main>
    
</body>
</html>