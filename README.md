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
Al apuntar a este endpoint, se debe proporcionar información para insertar un nuevo campo, en este caso, a modo explicativo, se hará a modo de objeto JSON con fotos de su inserción exitosa y respuesta del servidor.
"usuarios": {
    "nombre": "Juan Pérez",
    "correo": "juan.perez@example.com",
    "contraseña": "contraseña123",
    "telefono": "1234567890",
    "direccion": "Calle Falsa 123",
    "fecha_registro": "2024-12-18 12:00:00"
  }
![image](https://github.com/user-attachments/assets/0733206a-4725-4e34-b912-fa5411d17ec7) Respuesta del servidor
![image](https://github.com/user-attachments/assets/c97a5a2a-10df-4817-a636-97e8528249d8) Insert añadido a la base de datos



Insertar producto: http://localhost/proyectoPlataformas/public/index.php/productos
Al apuntar a este endpoint, se debe proporcionar información para insertar un nuevo campo, en este caso, a modo explicativo, se hará a modo de objeto JSON con fotos de su inserción exitosa y respuesta del servidor.
    "nombre": "Producto A",
    "descripcion": "Descripción del Producto A",
    "precio": 50.00,
    "stock": 100,
    "marca_id": 1,
    "imagen_url": "https://example.com/producto_a.jpg"
    ![image](https://github.com/user-attachments/assets/c99ebd1e-dd22-49ab-a745-c85df36e10f6) respuesta del servidor
    ![image](https://github.com/user-attachments/assets/87f6a437-8517-4481-9acc-68d63bdc16ea) prueba de inserción
    
Insertar nueva venta: http://localhost/proyectoPlataformas/public/index.php/ventas
Al apuntar a este endpoint, se debe proporcionar información para insertar un nuevo campo, en este caso, a modo explicativo, se hará a modo de objeto JSON con fotos de su inserción exitosa y respuesta del servidor.
"ventas": {
    "usuario_id": 1,
    "fecha_venta": "2024-12-18 12:30:00",
    "total": 100.00
  }
  ![image](https://github.com/user-attachments/assets/9c2a8c91-5087-4515-bddb-67cd9c8777bd) respuesta del servidor
  ![image](https://github.com/user-attachments/assets/467a59d2-47c3-4877-a730-11b422a33567) pruebas de inserción

Insertar nueva marca: http://localhost/proyectoPlataformas/public/index.php/marcas
Al apuntar a este endpoint, se debe proporcionar información para insertar un nuevo campo, en este caso, a modo explicativo, se hará a modo de objeto JSON con fotos de su inserción exitosa y respuesta del servidor.
{
    "nombre": "Marca X",
    "descripcion": "Descripción de Marca X"
  }
  ![image](https://github.com/user-attachments/assets/2052d4ce-f399-4b60-81a3-86b82bc8203e) respuesta del servidor
  ![image](https://github.com/user-attachments/assets/7eda38d8-b451-4118-9cc6-2ae19044f39a) prueba de inserción

Insertar nuevo detalle de venta: http://localhost/proyectoPlataformas/public/index.php/detalles
Al apuntar a este endpoint, se debe proporcionar información para insertar un nuevo campo, en este caso, a modo explicativo, se hará a modo de objeto JSON con fotos de su inserción exitosa y respuesta del servidor.
{
    "venta_id": 1,
    "producto_id": 1,
    "cantidad": 2,
    "precio_unitario": 15.50
  }
  ![image](https://github.com/user-attachments/assets/c6540f6e-03ba-41b1-8d5c-22eec3eb2e54) respuesta del servidor 
  ![image](https://github.com/user-attachments/assets/5dfa2fce-d4f9-476c-8a7a-23f278825623) prueba de inserción

Método DELETE:

Eliminar usuario http://localhost/proyectoPlataformas/public/index.php/usuarios?id=2
Al enviar como parámetro del id del usuario, se hará una eliminación del cual corresponda a ese id
respuesta del servidor: ![image](https://github.com/user-attachments/assets/2c426896-4e4b-4379-804e-021064e19a90)


Eliminar producto http://localhost/proyectoPlataformas/public/index.php/productos?id=4
Al enviar como parámetro del id del producto, se hará una eliminación del cual corresponda a ese id
respuesta del servidor: ![image](https://github.com/user-attachments/assets/08f9a0e6-cd70-4c20-979f-01f33f947258)


Eliminar marca http://localhost/proyectoPlataformas/public/index.php/marcas?id=2
Al enviar como parámetro del id de la marca, se hará una eliminación de la cual corresponda a ese id
respuesta del servidor: ![image](https://github.com/user-attachments/assets/0b6c4c9e-a994-4eea-a691-9bd761209816)


Método PUT:

Actualizar usuario http://localhost/proyectoPlataformas/public/index.php/usuarios?id=2
Al enviar como parámetro el id del registro elegido, seguido de la nueva información se actualizará, por cuestiones de ejemplo, se mostrará a modo de objeto JSON, con la respuesta del servidor.
{
    "nombre": "Juan Pérez",
    "correo": "juan.perez@eeeexample.com",
    "contraseña": "contraseña123",
    "telefono": "0987654321",
    "direccion": "Nueva dirección 456",
    "fecha_registro": "2024-12-18 12:00:00"
  }
  respuesta del servidor: ![image](https://github.com/user-attachments/assets/e14fefae-bcda-45f0-95d7-eed0a4b68f02)


Actualizar productos http://localhost/proyectoPlataformas/public/index.php/productos?id=2
Al enviar como parámetro el id del registro elegido, seguido de la nueva información se actualizará, por cuestiones de ejemplo, se mostrará a modo de objeto JSON, con la respuesta del servidor.
{
    "nombre": "Producto A",
    "descripcion": "Producto A con mejoras",
    "precio": 55.00,
    "stock": 90,
    "marca_id": 1,
    "imagen_url": "https://example.com/producto_a.jpg"
  }

respuesta del servidor: ![image](https://github.com/user-attachments/assets/e14fefae-bcda-45f0-95d7-eed0a4b68f02)

Actualizar ventas http://localhost/proyectoPlataformas/public/index.php/ventas?id=2
Al enviar como parámetro el id del registro elegido, seguido de la nueva información se actualizará, por cuestiones de ejemplo, se mostrará a modo de objeto JSON, con la respuesta del servidor.
{
    "usuario_id": 1,
    "fecha_venta": "2024-12-18 12:30:00",
    "total": 110.00
  }

respuesta del servidor: ![image](https://github.com/user-attachments/assets/e14fefae-bcda-45f0-95d7-eed0a4b68f02)

Actualizar marcas http://localhost/proyectoPlataformas/public/index.php/marcas?id=2
Al enviar como parámetro el id del registro elegido, seguido de la nueva información se actualizará, por cuestiones de ejemplo, se mostrará a modo de objeto JSON, con la respuesta del servidor.
 {
    "nombre": "Marca X",
    "descripcion": "Descripción actualizada de Marca X"
  }
respuesta del servidor: ![image](https://github.com/user-attachments/assets/e14fefae-bcda-45f0-95d7-eed0a4b68f02)

Actualizar detalles http://localhost/proyectoPlataformas/public/index.php/detalles?id=2
Al enviar como parámetro el id del registro elegido, seguido de la nueva información se actualizará, por cuestiones de ejemplo, se mostrará a modo de objeto JSON, con la respuesta del servidor.
 {
    "venta_id": 1,
    "producto_id": 1,
    "cantidad": 3,
    "precio_unitario": 16.00
  }

respuesta del servidor: ![image](https://github.com/user-attachments/assets/e14fefae-bcda-45f0-95d7-eed0a4b68f02)

