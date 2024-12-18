<?php
header('Content-Type: application/json');
require 'db.php';


// Configuración para mostrar errores en desarrollo
error_reporting(E_ALL);
ini_set('display_errors', 1);



// Verifica el método de solicitud
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['reporte'])) {
    ob_start(); // Inicia el buffer de salida
    header('Content-Type: application/json');

    $reporte = $_GET['reporte'];

    switch ($reporte) {
        case 'ventas_por_marca':
            // Consulta para obtener las cantidades vendidas según la marca
            $query = "
                SELECT 
                    descripcion AS marca, 
                    SUM(cantidad) AS total_vendidas
                FROM ventas1
                GROUP BY descripcion
                ORDER BY total_vendidas DESC
            ";
            $result = mysqli_query($conn, $query);

            if ($result) {
                $data = [];
                while ($row = mysqli_fetch_assoc($result)) {
                    $data[] = $row;
                }
                echo json_encode($data);
            } else {
                echo json_encode(['error' => 'Error al obtener las ventas por marca']);
            }
            break;

        case 'top_5_productos':
            // Consulta para obtener los 5 productos más vendidos
            $query = "
                SELECT 
                    descripcion AS producto, 
                    SUM(cantidad) AS total_vendidas
                FROM ventas1
                GROUP BY descripcion
                ORDER BY total_vendidas DESC
                LIMIT 5
            ";
            $result = mysqli_query($conn, $query);

            if ($result) {
                $top_productos = [];
                while ($row = mysqli_fetch_assoc($result)) {
                    $top_productos[] = $row;
                }
                echo json_encode($top_productos);
            } else {
                echo json_encode(['error' => 'Error al obtener el top 5 de productos']);
            }
            break;

        default:
            // Caso de reporte no válido
            echo json_encode(['error' => 'Reporte no válido']);
    }

    ob_end_flush(); // Envía la salida y limpia el buffer
    exit();
}

// Si la solicitud no es válida
header('Content-Type: application/json');
echo json_encode(['error' => 'Solicitud no válida']);
exit();

?>