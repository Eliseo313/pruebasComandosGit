<?php

require 'includes/database.php';

$db = conectarBD('pruebaloginbasico');

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $usuario = filter_input(INPUT_POST, 'usuario', 513);
    $contraseña = filter_input(INPUT_POST, 'contraseña', 513);

    if (!$usuario) {
        $errores[] = 'El usuario es obligatorio o no es válido';
    }

    if (!$contraseña) {
        $errores[] = 'La contraseña es obligatoria';
    }

    if (empty($errores)) {
        // Revisar si el usuario existe.
        $query = "SELECT * FROM consultorios WHERE nombreConsultorio = :usuario";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            //$auth = password_verify($contraseña, $usuario['contraseña']);
            $auth = $contraseña == $usuario['contraseña'] ? true : false;

            if ($auth) {
                session_start();

                $_SESSION['usuario'] = $usuario['nombreConsultorio'];
                $_SESSION['login'] = true;
                $_SESSION['licencia'] = $usuario['licencia_id'];

                $numeroDeLicencia = $_SESSION['licencia'];

                $queryLicenciaActiva = "SELECT * FROM licencias WHERE id = :numeroDeLicencia";
                $stmtLicencia = $db->prepare($queryLicenciaActiva);
                $stmtLicencia->bindParam(':numeroDeLicencia', $numeroDeLicencia, PDO::PARAM_INT);
                $stmtLicencia->execute();

                $licencia = $stmtLicencia->fetch(PDO::FETCH_ASSOC);

                if ($licencia && $licencia['activo'] == 1) {
                    header('Location: /perfiles.php');
                    exit();
                } else {
                    $errores[] = 'Licencia vencida';
                }
            } else {
                $errores[] = 'La contraseña es incorrecta';
            }
        } else {
            $errores[] = 'El usuario no existe';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Consultorio</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <header>
        <h1 class="titulo">CONSULTORIO MEDICO</h1>
        <div class="contenedor">
            <img src="img/logoConsultorio.png" class="img" alt="">
            <svg xmlns="http://www.w3.org/2000/svg" class="circulo icon icon-tabler icon-tabler-circle" width="185" height="185" viewBox="0 0 24 24" stroke-width="0.5" stroke="#F6F1F1" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
            </svg>
        </div>

    </header>
    <!-- ciclo foreach que muestra en pantalla porque no se pudo iniciar sesion
    ejemplo: la contraseña es incorrecta, el usuario no existe,etc... -->
    <?php foreach($errores as $error): ?>
            <div>
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

    <main>
        <form method="post">
            <section class="section">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#146C94" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                </svg>
            </section>
            <!--<input class="input" type="email" placeholder="Correo"> -->
            <input class="input" type="text" name="usuario" id="usuario" placeholder="Usuario" required />

            <section class="section">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#146C94" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z" />
                    <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
                    <path d="M8 11v-4a4 4 0 1 1 8 0v4" />
                </svg>
            </section>
            <!--<input class="input" type="password" placeholder="Contraseña"> -->
            <input class="input" type="password" name="contraseña" id="contraseña" placeholder="Contraseña" required />

            <section>
                <a href="perfiles.php">
                    <!--<button class="btn">INICIAR SESION</button> -->
                    <input class="btn" type="submit" value="Iniciar Sesion">
                </a>

            </section>

            <section>
                <p>¿Olvidaste tu contraseña?</p>
                <button class="btn">Crear nueva cuenta</button>
            </section>
        </form>
    </main>
</body>

</html>