<?php
require('includes/database2.php');
include('includes/funciones.php');

$sesionIniciada = estaAutentincado();

if (!$sesionIniciada) {
    header('Location: /');
}

$db = conectarBD2('prueba__cisco_1');
$citas[] = obtenerCitas($db);
$citas[] = $citas[0];
$citas = $citas[0];

date_default_timezone_set('America/Mexico_City');
$fechaActual = obtenerFechaActual();
$timestamp = strtotime($fechaActual);
$diaSemana = date('l', $timestamp);

$semanaActual = obtenerSemanaActual();

$citasSemanaActual = array_filter($citas, function ($cita) use ($semanaActual) {
    $numeroSemanaCita = date('W', strtotime($cita['fechaCita']));
    return $numeroSemanaCita == $semanaActual;
});

$horario = array(
    '14:00:00' => array(),
    '14:30:00' => array(),
    '15:00:00' => array(),
    '15:30:00' => array(),
    '16:00:00' => array(),
    '16:30:00' => array(),
    '17:00:00' => array(),
    '17:30:00' => array(),
    '18:00:00' => array(),
    '18:30:00' => array(),
    '19:00:00' => array(),
    '19:30:00' => array()
);

foreach ($citasSemanaActual as $cita) {
    $horaCita = $cita['horaInicioCita'];
    //var_dump($horaCita);
    $diaCita = obtenerDiaSemana($cita['fechaCita']);
    $motivoCita = $cita['motivoCita'];
    $nombrePaciente = obtenerNombrePaciente($db, $cita['paciente_id5']);

    $horario[$horaCita][$diaCita] = $nombrePaciente . ' - ' . $motivoCita;
}

include 'includes/templates/barraNavegacion.php';
?>

<main>
    <section>
        <h2 class="citas">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-notebook" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#146C94" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M6 4h11a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-11a1 1 0 0 1 -1 -1v-14a1 1 0 0 1 1 -1m3 0v18" />
                <path d="M13 8l2 0" />
                <path d="M13 12l2 0" />
            </svg>
            CITAS DE LA SEMANA
        </h2>
        <table>
            <tr>
                <th>Hora</th>
                <th>Lunes</th>
                <th>Martes</th>
                <th>Miércoles</th>
                <th>Jueves</th>
                <th>Viernes</th>
            </tr>
            <?php
            foreach ($horario as $hora => $dias) {
                echo '<tr>';
                echo '<td>' . $hora . '</td>';
                foreach (array('Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes') as $dia) {
                    echo '<td>' . (isset($dias[$dia]) ? $dias[$dia] : '') . '</td>';
                }
                echo '</tr>';
            }
            ?>
        </table>
    </section>

    <div class="botones">
        <section>
            <a href="">
                <button class="btn">
                    <svg xmlns="http://www.w3.org/2000/svg" class=" iconoBtn icon icon-tabler icon-tabler-calendar-plus" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#146C94" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12.5 21h-6.5a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v5" />
                        <path d="M16 3v4" />
                        <path d="M8 3v4" />
                        <path d="M4 11h16" />
                        <path d="M16 19h6" />
                        <path d="M19 16v6" />
                    </svg>
                    Agendar Cita
                </button>
            </a>
        </section>

        <section>
            <a href="">
                <button class="btn">
                    <svg xmlns="http://www.w3.org/2000/svg" class="iconoBtn icon icon-tabler icon-tabler-user-plus" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#146C94" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                        <path d="M16 19h6" />
                        <path d="M19 16v6" />
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4" />
                    </svg>
                    Nuevo Paciente
                </button>
            </a>
        </section>
    </div>

    <footer class="footer">
        <h3>
            Pendientes
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil-plus" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#146C94" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                <path d="M13.5 6.5l4 4" />
                <path d="M16 19h6" />
                <path d="M19 16v6" />
            </svg>
        </h3>
        <textarea name="" id="" rows="5"></textarea>
    </footer>
</main>

</body>

</html>