<?php
$username = $_COOKIE['usuario'];

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes de Ventas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" type="image/png" href="img/nikelogo.png">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">
            <img src="productos/default.jpg" alt="" width="70" height="65" class="d-inline-block align-text-top">
        </a>
        <!-- <span class="navbar-text"> Falcon Stock Control</span> -->
        <?php
// Obtener la hora actual en formato de 24 horas
date_default_timezone_set('America/Costa_Rica');
$hora = date('H');

// Determinar el saludo según la hora y el icono de Font Awesome
if ($hora >= 6 && $hora < 12) {
    $saludo = "Buenos Días";  // De 6 AM a 11:59 AM
    $icono = 'fa-sun';  // Icono de sol para el día
} elseif ($hora >= 12 && $hora < 18) {
    $saludo = "Buenas Tardes";  // De 12:00 PM a 5:59 PM
    $icono = 'fa-sunset';  // Icono de sol para la tarde
} else {
    $saludo = "Buenas Noches";  // De 6 PM a 5:59 AM
    $icono = 'fa-moon';  // Icono de luna para la noche
}
?>

<!-- Mostrar el saludo con el icono -->
<span class="navbar-text ms-3" style="margin-right: 25px;">
    <i class="fas <?php echo $icono; ?>"></i> <?php echo $saludo . ", " . $username; ?>
</span>
        <!-- <span class="navbar-text" style="margin-top: 75px;"> Sesión Iniciada: <?php //echo $username; ?></span> -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item  ">
                    <a class="nav-link" href="bienvenida.php">Menú principal</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="catalogo.php">Catálogo </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="reportes.php">Reportes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cerrar_sesion.php">Cerrar Sesión</a>
                </li>
                <!-- <span class="navbar-text ms-3" style="margin-right: 25px;">Sesión Iniciada: <?php //echo $username; ?></span> -->
            </ul>
        </div>
    </nav>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Reportes de Ventas</h1>

        <!-- Botones para cargar reportes -->
        <div class="d-flex justify-content-center mb-4">
            <button id="btnVentasPorMarca" class="btn btn-primary mx-2">Ventas por Marca</button>
            <button id="btnTop5Productos" class="btn btn-secondary mx-2">Top 5 Productos</button>
        </div>

        <!-- Tabla para mostrar resultados -->
        <div class="table-responsive">
            <table id="reporteTabla" class="table table-bordered table-striped">
                <thead>
                    <tr id="tablaHeaders">
                        <!-- Aquí se cargarán dinámicamente los encabezados -->
                    </tr>
                </thead>
                <tbody id="tablaCuerpo">
                    <!-- Aquí se cargarán dinámicamente los datos -->
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Función para realizar la solicitud AJAX
        function cargarReporte(reporte) {
            fetch(`http://localhost/nike/proyectoPlataformas/src/db/api2.php?reporte=${reporte}`)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert(data.error);
                        return;
                    }

                    // Llamar a la función para renderizar los datos
                    renderizarTabla(reporte, data);
                })
                .catch(error => {
                    console.error('Error al cargar el reporte:', error);
                });
        }

        // Función para renderizar la tabla en el frontend
        function renderizarTabla(reporte, datos) {
            const tablaHeaders = document.getElementById('tablaHeaders');
            const tablaCuerpo = document.getElementById('tablaCuerpo');

            // Limpiar la tabla antes de agregar nuevos datos
            tablaHeaders.innerHTML = '';
            tablaCuerpo.innerHTML = '';

            if (reporte === 'ventas_por_marca') {
                // Encabezados para "Ventas por Marca"
                tablaHeaders.innerHTML = `
                    <th>Marca</th>
                    <th>Total Vendidas</th>
                `;

                // Filas para "Ventas por Marca"
                datos.forEach(fila => {
                    tablaCuerpo.innerHTML += `
                        <tr>
                            <td>${fila.marca}</td>
                            <td>${fila.total_vendidas}</td>
                        </tr>
                    `;
                });
            } else if (reporte === 'top_5_productos') {
                // Encabezados para "Top 5 Productos"
                tablaHeaders.innerHTML = `
                    <th>Producto</th>
                    <th>Total Vendidas</th>
                `;

                // Filas para "Top 5 Productos"
                datos.forEach(fila => {
                    tablaCuerpo.innerHTML += `
                        <tr>
                            <td>${fila.producto}</td>
                            <td>${fila.total_vendidas}</td>
                        </tr>
                    `;
                });
            }
        }

        // Event Listeners para los botones
        document.getElementById('btnVentasPorMarca').addEventListener('click', () => {
            cargarReporte('ventas_por_marca');
        });

        document.getElementById('btnTop5Productos').addEventListener('click', () => {
            cargarReporte('top_5_productos');
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
