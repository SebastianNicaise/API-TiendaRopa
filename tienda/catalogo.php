<?php
$username = $_COOKIE['usuario'];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" type="image/png" href="img/nikelogo.png">
    <link rel="stylesheet" href="style.css">

    <style>
        .card-img-top {
    width: 100%; /* Asegura que la imagen ocupe todo el ancho de la card */
    height: 200px; /* Define una altura fija para las imágenes */
    object-fit: cover; /* Mantiene la proporción de la imagen mientras la ajusta al tamaño del contenedor */
}

    </style>
</head>
<body>

<!-- Navbar -->
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
                <li class="nav-item active">
                    <a class="nav-link" href="">Catálogo </a>
                </li>
                <li class="nav-item">
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
<h1 class="custom-h1 text-center">Catálogo de productos</h1>
<br>
    <button class="btn btn-negro mb-3" data-bs-toggle="modal" data-bs-target="#addModal">Ingresar Producto</button>
    <br>
    <div id="productos" class="row">
        <!-- Los productos se mostrarán aquí -->
    </div>
</div>

<!-- Modal de Ingreso de Producto -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Ingresar Nuevo Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addForm">
                    <div class="mb-3">
                        <label for="addNombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="addNombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="addDescripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="addDescripcion" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="addPrecio" class="form-label">Precio</label>
                        <input type="number" class="form-control" id="addPrecio" required>
                    </div>
                    <div class="mb-3">
                        <label for="addCantidad" class="form-label">Cantidad</label>
                        <input type="number" class="form-control" id="addCantidad" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Ingresar Producto</button>
                </form>
            </div>
        </div>
    </div>
</div>

    <!-- Modal de Edición -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Editar Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <div class="mb-3">
                            <label for="editNombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="editNombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="editDescripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="editDescripcion" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editPrecio" class="form-label">Precio</label>
                            <input type="number" class="form-control" id="editPrecio" required>
                        </div>
                        <div class="mb-3">
                            <label for="editCantidad" class="form-label">Cantidad</label>
                            <input type="number" class="form-control" id="editCantidad" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Confirmación de Eliminar -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro de que deseas eliminar este producto?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


    <script>
        // Función para manejar el formulario de ingreso de producto
document.getElementById('addForm').addEventListener('submit', async function(event) {
    event.preventDefault();
    
    const nombre = document.getElementById('addNombre').value;
    const descripcion = document.getElementById('addDescripcion').value;
    const precio = document.getElementById('addPrecio').value;
    const cantidad = document.getElementById('addCantidad').value;

    const response = await fetch('http://localhost/tiendaapi/api.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            nombre: nombre,
            descripcion: descripcion,
            precio: precio,
            cantidad: cantidad
        })
    });

    if (response.ok) {
        alert('Producto ingresado correctamente');
        $('#addModal').modal('hide');
        obtenerProductos();  // Actualizar lista de productos
    } else {
        alert('Error al ingresar el producto');
    }
});

    </script>

    <script>
        // Variables globales para manejar el producto actual a editar/eliminar
        let currentProductId = null;

        // Función para obtener los productos desde la API
        async function obtenerProductos() {
            const response = await fetch('http://localhost/nike/proyectoPlataformas/src/db/api.php');
            const productos = await response.json();
            let html = '';

            productos.forEach(prod => {
                html += `
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="productos/${prod.id}.jpg" onError="this.onerror=null; this.src='productos/default.jpg'" class="card-img-top" alt="${prod.nombre}">
                            <div class="card-body">
                                <h5 class="card-title">${prod.nombre}</h5>
                                <p class="card-text">${prod.descripcion}</p>
                                <p class="card-text"><strong>Precio:</strong> $${prod.precio}</p>
                                <p class="card-text"><strong>Cantidad:</strong> ${prod.cantidad}</p>
                                <button class="btn btn-negro" onclick="editarProducto(${prod.id})" data-bs-toggle="modal" data-bs-target="#editModal">Editar</button>
                                <button class="btn btn-negro" onclick="confirmarEliminacion(${prod.id})" data-bs-toggle="modal" data-bs-target="#deleteModal">Eliminar</button>
                            </div>
                        </div>
                    </div>
                `;
            });

            document.getElementById('productos').innerHTML = html;
        }

        // Función para cargar los datos del producto en el modal de edición
        async function editarProducto(id) {
            currentProductId = id;
            const response = await fetch(`http://localhost/tiendaapi/api.php?id=${id}`);
            const product = await response.json();
            
            document.getElementById('editNombre').value = product.nombre;
            document.getElementById('editDescripcion').value = product.descripcion;
            document.getElementById('editPrecio').value = product.precio;
            document.getElementById('editCantidad').value = product.cantidad;
        }

        // Función para manejar el formulario de edición
        document.getElementById('editForm').addEventListener('submit', async function(event) {
            event.preventDefault();
            const nombre = document.getElementById('editNombre').value;
            const descripcion = document.getElementById('editDescripcion').value;
            const precio = document.getElementById('editPrecio').value;
            const cantidad = document.getElementById('editCantidad').value;

            const response = await fetch(`http://localhost/tiendaapi/api.php?id=${currentProductId}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    nombre: nombre,
                    descripcion: descripcion,
                    precio: precio,
                    cantidad: cantidad
                })
            });

            if (response.ok) {
                alert('Producto actualizado correctamente');
                $('#editModal').modal('hide');
                obtenerProductos();  // Actualizar lista de productos
            } else {
                alert('Error al actualizar el producto');
            }
        });

        // Función para confirmar la eliminación de un producto
        function confirmarEliminacion(id) {
            currentProductId = id;
        }

        // Función para eliminar el producto
        document.getElementById('confirmDeleteBtn').addEventListener('click', async function() {
            const response = await fetch(`http://localhost/tiendaapi/api.php?id=${currentProductId}`, {
                method: 'DELETE'
            });

            if (response.ok) {
                alert('Producto eliminado correctamente');
                $('#deleteModal').modal('hide');
                obtenerProductos();  // Actualizar lista de productos
            } else {
                alert('Error al eliminar el producto');
            }
        });

        // Cargar productos cuando la página cargue
        window.onload = obtenerProductos;
    </script>

<footer class="footer">
        <div class="footer-content container">
            <div class="link">
                <h3>Desarrollado por:</h3>
                <ul>
                    <li><a href="">Kendall Pereira Méndez</a></li>
                    <li><a href="">Sebástian Nicaise Chacón</a></li>
                    <li><a href="">Ing Informatica</a></li>
                    <li><a href="">2024</a></li>
                </ul>
            </div>
            <div class="link">
                <h3>Tienda Nike</h3>
                <ul>
                    <li><a href="">© 2024 Tienda Nike</a></li>
                    <li><a href="">Todos los derechos reservados</a></li>
                    <li><a href="">V.2.1.5</a></li>
                </ul>
            </div>
            <div class="link">
                <h3>Enlaces útiles</h3>
                <ul>
                    <li><a href="">Política</a></li>
                    <li><a href="">Términos de uso</a></li>
                    <li><a href="">Aviso legal</a></li>
                </ul>
            </div>
        </div>
    </footer>
</body>
</html>
