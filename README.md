# Kendall-y-Sebastian-plataformas-abiertas

🛍️ Sistema de Gestión para Tienda de Ropa

Este proyecto consiste en la creación de un Sistema de Gestión de Ventas para una tienda de ropa. El sistema maneja el control de productos, usuarios, marcas y ventas, proporcionando una solución eficiente para la gestión de inventarios y análisis de ventas.
📄 Descripción del Proyecto: El sistema permite registrar y consultar productos, gestionar las ventas y realizar análisis de datos relacionados con las marcas más vendidas y el inventario restante. La base de datos relacional se ha diseñado para optimizar la integridad referencial entre tablas mediante el uso de claves foráneas.

🚀 Características Principales

    Gestión de productos: Permite registrar prendas de ropa, su precio, cantidad en stock y la marca correspondiente.
    Gestión de ventas: Los detalles de cada venta son registrados, actualizando automáticamente el inventario disponible.
    Control de usuarios: Registra información de los clientes para vincularlos a sus respectivas compras.
    Reportes de ventas: Genera reportes sobre marcas más vendidas, cantidad de prendas vendidas y el inventario restante.



📊 Diagrama 

![Diagrama ER](./imagenes/diagrama_bd.png)

# End-points

Método Get:
Obtener usuario por ID:
http://localhost/apiProyecto/public/index.php/usuarios?{id}

Obtener todos los usuarios:
http://localhost/apiProyecto/public/index.php/usuarios

Obtener ventas por ID:
http://localhost/apiProyecto/public/index.php/ventas?{id}

Obtener todas las ventas:
http://localhost/apiProyecto/public/index.php/ventas

Obtener productos por ID:
http://localhost/apiProyecto/public/index.php/ventas?{id}

Obtener todos los productos:
http://localhost/apiProyecto/public/index.php/productos

Obtener marcas por ID:
http://localhost/apiProyecto/public/index.php/marcas?{id}

Obtener todas las marcas:
http://localhost/apiProyecto/public/index.php/marcas

Obtener detalles de ventas por ID:
http://localhost/apiProyecto/public/index.php/detalles?{id}

Obtener todos los detalles de las ventas:
http://localhost/apiProyecto/public/index.php/detalles

//Reportes
Obtener Top 5 marcas:
http://localhost/apiProyecto/public/index.php/topMarcas

Obtener marcas con Ventas:
http://localhost/apiProyecto/public/index.php/marcasVentas

Obtenerprendas en stock:
http://localhost/apiProyecto/public/index.php/prendasStock

Método POST:

Insertar nuevo usuario: 
http://localhost/apiProyecto/public/index.php/usuarios

Insertar producto: 
http://localhost/apiProyecto/public/index.php/productos

Insertar nueva venta: 
http://localhost/apiProyecto/public/index.php/ventas

Insertar nueva marca: 
http://localhost/apiProyecto/public/index.php/marcas

Insertar nuevo detalle de venta: 
http://localhost/apiProyecto/public/index.php/detalles
