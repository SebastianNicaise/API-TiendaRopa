<?php
header('Content-Type: application/json');
require 'db.php';

// Verifica el método HTTP
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            // Obtener un producto por ID
            $id = intval($_GET['id']);
            $sql = "SELECT * FROM productos WHERE id = $id";
            $result = $conn->query($sql);
            echo json_encode($result->fetch_assoc());
        } else {
            // Obtener todos los productos
            $sql = "SELECT * FROM productos";
            $result = $conn->query($sql);
            $productos = [];
            while ($row = $result->fetch_assoc()) {
                $productos[] = $row;
            }
            echo json_encode($productos);
        }
        break;

    case 'POST':
        // Insertar un nuevo producto
        $data = json_decode(file_get_contents("php://input"), true);
        $nombre = $data['nombre'];
        $descripcion = $data['descripcion'];
        $precio = $data['precio'];
        $cantidad = $data['cantidad'];

        $sql = "INSERT INTO productos (nombre, descripcion, precio, cantidad) 
                VALUES ('$nombre', '$descripcion', $precio, $cantidad)";
        if ($conn->query($sql) === TRUE) {
            echo json_encode(['message' => 'Producto insertado correctamente']);
        } else {
            echo json_encode(['error' => $conn->error]);
        }
        break;

        case 'PUT':
            // Obtener el ID desde la URL
            if (isset($_GET['id'])) {
                $id = intval($_GET['id']);  // Obtener el ID del producto
                $data = json_decode(file_get_contents("php://input"), true);  // Obtener los datos enviados en el cuerpo
        
                $nombre = $data['nombre'];
                $descripcion = $data['descripcion'];
                $precio = $data['precio'];
                $cantidad = $data['cantidad'];
        
                // SQL para actualizar el producto
                $sql = "UPDATE productos 
                        SET nombre='$nombre', descripcion='$descripcion', precio=$precio, cantidad=$cantidad 
                        WHERE id=$id";
        
                if ($conn->query($sql) === TRUE) {
                    echo json_encode(['message' => 'Producto actualizado correctamente']);
                } else {
                    echo json_encode(['error' => $conn->error]);
                }
            } else {
                echo json_encode(['error' => 'ID no proporcionado']);
            }
            break;
        

        case 'DELETE':
            // Obtener el ID desde la URL (no desde el cuerpo)
            if (isset($_GET['id'])) {
                $id = intval($_GET['id']);  // Obtener el ID del producto
        
                $sql = "DELETE FROM productos WHERE id=$id";
                if ($conn->query($sql) === TRUE) {
                    echo json_encode(['message' => 'Producto eliminado correctamente']);
                } else {
                    echo json_encode(['error' => $conn->error]);
                }
            } else {
                echo json_encode(['error' => 'ID no proporcionado']);
            }
            break;

    default:
        echo json_encode(['error' => 'Método no soportado']);
        break;
}


$conn->close();
?>
