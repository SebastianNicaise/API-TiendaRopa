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
Obtener usuario por ID: http://localhost/proyectoPlataformas/public/index.php/usuarios?id=...(3 para cuestiones de ejemplo)
Al enviar el parámetro con el id 3, se retorna el nombre el usuario registrado en base de datos.
{
    "Resultado": {
        "nombre": "Luis Rodríguez"
    }
}

Obtener todos los usuarios: http://localhost/proyectoPlataformas/public/index.php/usuarios
Se envía una solicitud de tipo get al endpoint y se obtiene una respuesta como esta:
        {
            "id": 1,
            "nombre": "Juan Pérez",
            "correo": "juanperez@example.com",
            "contraseña": "password123",
            "telefono": "555-1234",
            "direccion": "Calle Falsa 123",
            "fecha_registro": "2024-01-01 10:00:00"
        }

Obtener ventas por ID: http://localhost/proyectoPlataformas/public/index.php/ventas?id=...
Al hacer la solicitud con el envío del parámetro id asociado a ventas, se obtiene la identificación de la venta junto con el id del usuario que la realizó
{
    "Resultado": {
        "id": 3,
        "usuario_id": 3
    }
}


Obtener todas las ventas: http://localhost/proyectoPlataformas/public/index.php/ventas
Al hacer la solicitud de todas las ventas sin enviar un parámetro, se obtienen una respuesta como la siguiente, con todas las ventas registradas, con información adicional de la fecha y el total pagado/por pagar:
{
    "Resultado": [
        {
            "id": 1,
            "usuario_id": 1,
            "fecha_venta": "2024-06-01 10:15:00",
            "total": "89.97"
        }

Obtener productos por ID: http://localhost/proyectoPlataformas/public/index.php/productos?id=4
Tras solicitar la información correspondiente al id #4, se retorna la información del producto con esa identificación, en este caso su nombre y el precio del producto.
{
    "Resultado": {
        "nombre": "Camiseta Deportiva",
        "precio": "19.99"
    }
}

Obtener todos los productos: http://localhost/proyectoPlataformas/public/index.php/productos
Tras hacer la solicitud al endpoint, se retorna la información completa de todos los productos almacenados, por ejemplo este, con su descripción, cantidad en stock, identificador de marca e imagen:
{
    "Resultado": [
        {
            "id": 4,
            "nombre": "Camiseta Deportiva",
            "descripcion": "Camiseta transpirable, perfecta para hacer ejercicio.",
            "precio": "19.99",
            "stock": 100,
            "marca_id": 5,
            "imagen_url": "url_imagen4.jpg"
        }

Obtener marcas por ID: http://localhost/proyectoPlataformas/public/index.php/marcas?id=5
Tras enviar el parámetro de id, se obtiene la información correspondiente al identificador, en este caso; su id y su nombre.
{
    "Resultado": {
        "id": 5,
        "nombre": "Deportes Activos"
    }
}

Obtener todas las marcas: http://localhost/proyectoPlataformas/public/index.php/marcas
Tras hacer la solicitud al endpoint, se retornan todas las marcas con sus detalles específicos; por ejemplo este.
{
    "Resultado": [
        {
            "id": 1,
            "nombre": "Estilo Moderno",
            "descripcion": "Ropa con un toque contemporáneo y elegante."
        }

Obtener detalles de ventas por ID: http://localhost/proyectoPlataformas/public/index.php/detalles?id=5
Al enviar el id como parámetro, se obtiene la información de los detalles de una venta, que trae a su vez, la identificación de la venta a la que pertenece; por ejemplo la #5:
{
    "Resultado": {
        "id": 5,
        "venta_id": 5,
        "producto_id": 4
    }
}


Obtener todos los detalles de las ventas: http://localhost/proyectoPlataformas/public/index.php/detalles
Al hacer la solicitud de todos los detalles de venta, se muestra información adicional de la consulta, por ejemplo esta:
        {
            "id": 5,
            "venta_id": 5,
            "producto_id": 4,
            "cantidad": 1,
            "precio_unitario": "19.99"
        }

//Reportes Obtener Top 5 marcas: http://localhost/proyectoPlataformas/public/index.php/topMarcas
Al apuntar a este endpoint, se mostrará el top 5 de marcas (de haber un top 5 definido) de la tienda de ropa, cabe destacar, que al ser una vista, esta no puede ser actualizada por un usuario, sino que el proceso se hace mediante la base de datos. 
{
    "Resultado": [
        {
            "marca_id": 1,
            "marca_nombre": "Estilo Moderno",
            "cantidad_ventas": 4
        },
        {
            "marca_id": 5,
            "marca_nombre": "Deportes Activos",
            "cantidad_ventas": 1
        }
    ]
}

Obtener marcas con Ventas: http://localhost/proyectoPlataformas/public/index.php/marcasVentas
Al apuntar a este endpoint, se mostrarán todas las marcas que tengan al menos una venta en la tienda de ropa, cabe destacar, que al ser una vista, esta no puede ser actualizada por un usuario, sino que el proceso se hace mediante la base de datos. 
{
    "Resultado": [
        {
            "marca_id": 1,
            "marca_nombre": "Estilo Moderno"
        },
        {
            "marca_id": 5,
            "marca_nombre": "Deportes Activos"
        }
    ]
}

Obtener prendas en stock: http://localhost/proyectoPlataformas/public/index.php/prendasStock
Al apuntar a este endpoint, se mostrará información de las prendas en stock, así como las ventas realizadas previamente, cabe destacar, que al ser una vista, esta no puede ser actualizada por un usuario, sino que el proceso se hace mediante la base de datos. 
{
    "Resultado": [
        {
            "producto_id": 4,
            "producto_nombre": "Camiseta Deportiva",
            "stock_restante": 100,
            "cantidad_vendida": "1"
        },
        {
            "producto_id": 5,
            "producto_nombre": "Vestido de Verano",
            "stock_restante": 20,
            "cantidad_vendida": "33"
        },
        {
            "producto_id": 8,
            "producto_nombre": "Camisa Polo",
            "stock_restante": 60,
            "cantidad_vendida": "65"
        }
    ]
}

Método POST:

Insertar nuevo usuario: http://localhost/proyectoPlataformas/public/index.php/usuarios

Insertar producto: http://localhost/proyectoPlataformas/public/index.php/productos

Insertar nueva venta: http://localhost/proyectoPlataformas/public/index.php/ventas

Insertar nueva marca: http://localhost/proyectoPlataformas/public/index.php/marcas

Insertar nuevo detalle de venta: http://localhost/proyectoPlataformas/public/index.php/detalles

Método DELETE:

Eliminar usuario http://localhost/proyectoPlataformas/public/index.php/usuarios?{id}

Eliminar producto http://localhost/proyectoPlataformas/public/index.php/productos?{id}

Eliminar marca http://localhost/proyectoPlataformas/public/index.php/marcas?{id}

Método PUT:

Actualizar usuario http://localhost/proyectoPlataformas/public/index.php/usuarios?{id}

Actualizar productos http://localhost/proyectoPlataformas/public/index.php/productos?{id}

Actualizar ventas http://localhost/proyectoPlataformas/public/index.php/ventas?{id}

Actualizar marcas http://localhost/proyectoPlataformas/public/index.php/marcas?{id}

Actualizar detalles http://localhost/proyectoPlataformas/public/index.php/detalles?{id}

Actualizar marcas
http://localhost/apiProyecto/public/index.php/marcas?{id}

Actualizar detalles
http://localhost/apiProyecto/public/index.php/detalles?{id}

