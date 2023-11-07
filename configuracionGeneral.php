<?php
    include 'includes/templates/header.php'
?>
<main>
        <a  class="iconoCerrar" href="paginaPrincipal.php">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="30" height="30" viewBox="0 0 24 24" stroke-width="3" stroke="#146C94" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M18 6l-12 12" />
                <path d="M6 6l12 12" />
            </svg>
        </a>
        <section class="contenido-1">
            <h1>DATOS DEL CONSULTORIO</h1>
            <label>Nombre</label>
            <input type="text" placeholder="Nombre">
            <label>Direccion</label>
            <input type="text" placeholder="Direccion">
            <label>Propietario</label>
            <input type="text" placeholder="Propietario">
        </section>
        <button class="btn">
            Guardar
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#146C94" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                <path d="M14 4l0 4l-6 0l0 -4" />
            </svg>
        </button>

        <div class="linea"></div>

        <section class="contenido-2">
            <h2>Membresia</h2>
            <select class="año" name="año" id="">
                <option>2023</option>
                <option>2024</option>
            </select>
            <select class="mes" name="mes" id="">
                <option>Octubre</option>
                <option>Noviembre</option>
                <option>Diciembre</option>
            </select>
            <input type="text" placeholder="Codigo">
        </section>
        <button class="btn">
            Guardar
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#146C94" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                <path d="M14 4l0 4l-6 0l0 -4" />
            </svg>
        </button>
        
    </main>
    
</body>
</html>