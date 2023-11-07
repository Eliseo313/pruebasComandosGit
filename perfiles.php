<?php
require 'includes/database2.php';
include 'includes/funciones.php';

$auth = estaAutentincado();

if(!$auth){
    header('Location: /');
}

$db = conectarBD2('prueba__cisco_1');
$perfiles = obtenerPerfiles($db);
$errores = [];
$contadorPerfiles = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $perfil = filter_input(INPUT_POST, 'perfil', 513);
    $contraseña = filter_input(INPUT_POST, 'contraseña', 513);

    if (!$perfil) {
        $errores[] = 'El perfil es obligatorio o no es válido';
    }

    if (!$contraseña) {
        $errores[] = 'La contraseña es obligatoria';
    }

    if (empty($errores)) {
        // Revisar si el perfil existe.
        $query = "SELECT * FROM perfil WHERE nombrePerf = :perfil";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':perfil', $perfil, PDO::PARAM_STR);
        $stmt->execute();

        $perfil = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($perfil) {
            //$auth = password_verify($contraseña, $perfil['contraseniaPerf']);
            //$auth = $contraseña == $perfil['contraseniaPerf'] ? true : false;
            if ($contraseña == $perfil['contraseniaPerf']) {
                $_SESSION['perfil'] = $perfil['nombrePerf'];
                $_SESSION['idPerfil'] = $perfil['idPerf'];
                $_SESSION['correoPerfil'] = $perfil['correoPerf'];
                header('Location: /pruebasComandosGit/bienvenida.php');
                exit();
            } else {
                $errores[] = 'La contraseña es incorrecta';
            }
        } else {
            $errores[] = 'El perfil no existe';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenido a los perfiles de tu usuario, <?php echo $_SESSION['usuario'] ?>  </h1>
    <?php foreach($errores as $error): ?>
            <div>
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

    
    <div class="contenedor-perfiles">
        
        <h2>¿Quien esta trabajando ahora?</h2>

            <div class="perfiles">
                <?php foreach($perfiles as $perfil): ?>

                    <form method="post" >
                        <button class="perfil-button" >
                            <img src="perfil1.jpg" alt="Perfil 1">
                            <h3><?php echo $perfil['nombrePerf'];  ?> </h3>
                            <input type="hidden" name="perfil" id="perfil" value=<?php echo $perfil['nombrePerf'];  ?> required/>
                        </button>
                        <div>
                            <label for="contraseña"> Contraseña: </label>
                            <input type="password" name="contraseña" id="contraseña" placeholder="Contraseña" />
                        </div>
                        <input type="submit" value="Entrar">
                     </form>

                <?php endforeach; ?>
            </div>
    </div>
</body>
</html>