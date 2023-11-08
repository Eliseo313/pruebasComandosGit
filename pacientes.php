<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes</title>
    <link rel="stylesheet" href="css/pacientes.css">
</head>

<body>
    <?php include 'includes/templates/barraNavegacion.php'; ?>

    <header class="barra">
        <h1 class="titulo">PACIENTES</h1>
        <div>
            <a class="iconos">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-plus" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#F6F1F1" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                    <path d="M16 19h6" />
                    <path d="M19 16v6" />
                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4" />
                </svg>
            </a>
        </div>
        <section class="buscar">
            <input type="search" placeholder="Buscar">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#F6F1F1" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                <path d="M21 21l-6 -6" />
            </svg>
        </section>
    </header>

    <section class="tarjetas">
        <div class="card">
            <img class="imgCard" src="img/paciente.png" alt="">
            <div class="text">
                <p>Ana Lopez</p>
                <p>32 años</p>
                <p>453-120-09-23</p>
            </div>
        </div>
        <div class="card">
            <img class="imgCard" src="img/paciente.png" alt="">
            <div class="text">
                <p>Ana Lopez</p>
                <p>32 años</p>
                <p>453-120-09-23</p>
            </div>
        </div>
        <div class="card">
            <img class="imgCard" src="img/paciente.png" alt="">
            <div class="text">
                <p>Ana Lopez</p>
                <p>32 años</p>
                <p>453-120-09-23</p>
            </div>
        </div>
        <div class="card">
            <img class="imgCard" src="img/paciente.png" alt="">
            <div class="text">
                <p>Ana Lopez</p>
                <p>32 años</p>
                <p>453-120-09-23</p>
            </div>
        </div>
        <div class="card">
            <img class="imgCard" src="img/paciente.png" alt="">
            <div class="text">
                <p>Ana Lopez</p>
                <p>32 años</p>
                <p>453-120-09-23</p>
            </div>
        </div>
        <div class="card">
            <img class="imgCard" src="img/paciente.png" alt="">
            <div class="text">
                <p>Ana Lopez</p>
                <p>32 años</p>
                <p>453-120-09-23</p>
            </div>
        </div>
        <div class="card">
            <img class="imgCard" src="img/paciente.png" alt="">
            <div class="text">
                <p>Ana Lopez</p>
                <p>32 años</p>
                <p>453-120-09-23</p>
            </div>
        </div>
        <div class="card">
            <img class="imgCard" src="img/paciente.png" alt="">
            <div class="text">
                <p>Ana Lopez</p>
                <p>32 años</p>
                <p>453-120-09-23</p>
            </div>
        </div>
        <div class="card">
            <img class="imgCard" src="img/paciente.png" alt="">
            <div class="text">
                <p>Ana Lopez</p>
                <p>32 años</p>
                <p>453-120-09-23</p>
            </div>
        </div>
    </section>

    <section>
        <button class="flechaIzquierda">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-arrow-left" width="50" height="50" viewBox="0 0 24 24" stroke-width="1.5" stroke="#146C94" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 8l-4 4l4 4" />
                <path d="M16 12h-8" />
                <path d="M3 3m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
            </svg>
        </button>

        <button class="flechaDerecha">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-arrow-right" width="50" height="50" viewBox="0 0 24 24" stroke-width="1.5" stroke="#146C94" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 16l4 -4l-4 -4" />
                <path d="M8 12h8" />
                <path d="M3 3m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
            </svg>
        </button>
    </section>

</body>

</html>