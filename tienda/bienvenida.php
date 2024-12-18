<?php
include ('conexion.php');
session_start();

// Verificar si la variable de sesión está seteada
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}
$username = $_COOKIE['usuario'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Nike</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="icon" type="image/png" href="img/nikelogo.png">
    <style>
        /* Estilo para el marquee */
        .marquee {
            white-space: nowrap;
            overflow: hidden;
            position: relative;
            width: 100%;
            background-color: #f0f0f0; /* Color de fondo */
            padding: 10px 0; /* Espaciado vertical */
        }

        .marquee-content {
            display: inline-block;
            animation: marquee 10s linear infinite;
        }

        @keyframes marquee {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="menu">
                <div class="logo">
                    <img src="img/logo2.png" alt="" width="70" height="65" class="logo">
                </div>
                <input type="checkbox" id="menu">
                <label for="menu" class="menu-icono">
                    <img src="images/menu.png" alt="Menu Icon">
                </label>
                <div class="navbar">
                    <ul>
                        <li><a href="cerrar_sesion.php">Cerrar sesión</a></li>
                    </ul>
                </div>
            </div>
            <div class="header-content">
                <div class="header-img">
                    <img src="img/logo2.png" alt="Header Image">
                </div>
                <div class="header-txt">
                    <h1>Tienda Nike</h1>
                    <p>Encuentra las mejores prendas</p>
                    <p>Te damos la bienvenida, <span class="username"><?php echo $username; ?></span>!</p>
                </div>
            </div>
        </div>
    </header>

    <section class="ofert container">
        <div class="ofert-1">
            <div class="ofert-img">
                <img src="img/4.png" alt="">
            </div>
            <div class="ofert-txt">
                <h3>Control de productos</h3>
            </div>
        </div>
        <div class="ofert-1">
            <div class="ofert-img">
                <img src="img/5.png" alt="">
            </div>
            <div class="ofert-txt">
                <h3>Facturación</h3>
            </div>
        </div>
        <div class="ofert-1">
            <div class="ofert-img">
                <img src="img/6.png" alt="">
            </div>
            <div class="ofert-txt">
                <h3>Reportes</h3>
            </div>
        </div>
    </section>
    <br>
    <br>

    <!-- Marquee effect -->
    <div class="marquee">
        <div class="marquee-content">
            <span>¡Bienvenido a Tienda Nike! | Mantente al día con nuestras actualizaciones | Explora nuestros programas disponibles!</span>
        </div>
    </div>

    <main class="products container" id="lista-1">
        <h2>-- Funciones Disponibles --</h2>
        <div class="product-content">
            <div class="product">
                <img src="img/1.png" alt="">
                <div class="product-txt">
                    <h3>Catálogo</h3>
                    <p>Calzado, Caballero, Dama, Niños</p>
                    <a href="catalogo.php" class="agregar-carrito btn-2" data-id="1">Entrar</a>
                </div>
            </div>
            <div class="product">
                <img src="img/2.png" alt="">
                <div class="product-txt">
                    <h3>Facturación</h3>
                    <p>Proceso de facturación</p>
                    <a href="isleña/is_main.php" class="agregar-carrito btn-2" data-id="1">Entrar</a>
                </div>
            </div>
            <div class="product">
                <img src="img/3.png" alt="">
                <div class="product-txt">
                    <h3>Reportes</h3>
                    <p>Reportes de ventas</p>
                    <a href="reportes.php" class="agregar-carrito btn-2" data-id="1">Entrar</a>
                </div>
            </div>
        </div>
    </main>

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
