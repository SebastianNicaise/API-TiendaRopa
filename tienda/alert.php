<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos Guardados</title>
    <link rel="icon" type="image/png" href="img/logofalcon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&display=swap"> <!-- Cargar la tipografía Oswald -->
    <style>
        /* Establecer tipografía y fondo de la página */
        body {
            font-family: 'Oswald', sans-serif; /* Aplicar tipografía Oswald */
            background-color: #ffffff; /* Fondo blanco de la página */
            margin: 0;
            padding: 0;
        }

        /* Cambios en el modal de SweetAlert2 */
        .swal2-popup {
            font-family: 'Oswald', sans-serif !important; /* Cambia la tipografía del modal */
            background-color: #f5f5f5 !important; /* Color de fondo del modal */
        }

        /* Estilos personalizados para el botón de confirmación */
        .swal2-confirm {
            background-color: #000000 !important; /* Color de fondo del botón de confirmación (negro) */
            color: white !important; /* Color del texto del botón de confirmación */
            border: none !important; /* Elimina el borde del botón */
            box-shadow: none !important; /* Elimina la sombra del botón */
        }

        /* Estilos personalizados para el fondo del modal */
        .swal2-container {
            background-color: rgba(0, 0, 0, 0.5) !important; /* Color de fondo del overlay */
        }

        /* Estilos personalizados para el título y el texto */
        .swal2-title {
            color: #333 !important; /* Color del título */
        }

        .swal2-html-container {
            color: #666 !important; /* Color del texto */
        }
    </style>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script>
        // Obtener parámetros de la URL
        const urlParams = new URLSearchParams(window.location.search);
        const status = urlParams.get('status');

        // Mostrar el mensaje con SweetAlert
        if (status === 'success') {
            Swal.fire({
                icon: 'success',
                title: 'Datos Guardados con Éxito',
                text: 'Los datos se han guardado correctamente.',
                customClass: {
                    confirmButton: 'swal2-confirm'
                },
                confirmButtonText: 'OK',
                allowOutsideClick: false, // Deshabilita el cierre al hacer clic fuera
                allowEscapeKey: false,     // Deshabilita el cierre con la tecla Esc
                didClose: () => {
                    window.location.href = document.referrer; // Redirige a la página deseada
                }
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Hubo un problema al guardar los datos.',
                customClass: {
                    confirmButton: 'swal2-confirm'
                },
                confirmButtonText: 'OK',
                allowOutsideClick: false, // Deshabilita el cierre al hacer clic fuera
                allowEscapeKey: false,     // Deshabilita el cierre con la tecla Esc
                didClose: () => {
                    window.location.href = document.referrer; // Redirige a la página deseada
                }
            });
        }
    </script>
</body>
</html>
