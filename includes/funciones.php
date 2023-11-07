<?php

function estaAutentincado(): bool {
    session_start();
    $auth = $_SESSION["login"];
    if($auth){
        return true;
    }
    return false;
}
function obtenerPerfiles($db){
    try {
        $query = "SELECT * FROM perfil;";
        $stmt = $db->query($query);
        $perfiles = [];

        if ($stmt) {
            $perfiles = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $perfiles;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function obtenerCitas($db){
    try {
        $query = "SELECT * FROM Cita;";
        $stmt = $db->query($query);
        $citas = [];

        if ($stmt) {
            $citas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $citas;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
function obtenerCitas2($db) {
    try {
        $query = "SELECT * FROM Cita;";
        $stmt = $db->query($query);

        if ($stmt) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}


function obtenerNombrePaciente($db, $idPaciente){
    try {
        $query = "SELECT * FROM Paciente WHERE idPac = $idPaciente;";
        $stmt = $db->query($query);
        $paciente = '';
        

        if ($stmt) {
            $paciente = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $paciente[0]['nombresPac'];
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

//calcula que dia es hoy en formato '2023-11-03'
function obtenerFechaActual() {
    $fechaActual = date('Y-m-d'); // Formato 'Y-m-d' para año-mes-día
    return $fechaActual;
}

//devuelve el numero de la semana del año, por ejemplo si estamos a '2023-11-02'
//va retornar 44, pues es la semana 44 del año 2023
function obtenerSemanaActual() {
    $semanaActual = date('W'); 
    return $semanaActual;
}

//recibe un '2023-11-03' y retorna 'Viernes'
function obtenerDiaSemana($fecha) {
    $diasSemana = array(
        'Sunday' => 'Domingo',
        'Monday' => 'Lunes',
        'Tuesday' => 'Martes',
        'Wednesday' => 'Miércoles',
        'Thursday' => 'Jueves',
        'Friday' => 'Viernes',
        'Saturday' => 'Sábado'
    );

    $nombreDia = date('l', strtotime($fecha));
    return $diasSemana[$nombreDia];
}

function obtenerFechaFormateada() {
    // Días de la semana
    $diasSemana = array(
        "Domingo", "Lunes","Martes","Miércoles","Jueves","Viernes","Sábado"
    );
    // Meses
    $meses = array(
        "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
    );

    // Obtén la fecha actual
    $fechaActual = date("Y-m-d");
    $diaSemana = $diasSemana[date('w', strtotime($fechaActual))];
    $dia = date('d', strtotime($fechaActual));
    $mes = $meses[date('n', strtotime($fechaActual)) - 1];
    $anio = date('Y');

    // Formatea la fecha en el estilo deseado
    $fechaFormateada = "$diaSemana, $dia de $mes de $anio";
    
    return $fechaFormateada;
}

function obtenerHoraFormateada() {
    // Obtiene la hora actual en formato de 24 horas (HH:MM:SS)
    $horaActual = date("H:i:s");
    
    // Formatea la hora en el estilo deseado (12 horas con AM/PM)
    $horaFormateada = date("h:i A", strtotime($horaActual));
    
    return $horaFormateada;
}

function obtenerDetallesPerfil($db,$idPerfil){
    try {
        $query = "SELECT * FROM DetallePerf WHERE idDetPerf = $idPerfil;";
        $stmt = $db->query($query);
        $detallesPerfil = '';
        

        if ($stmt) {
            $detallesPerfil = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $detallesPerfil;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>