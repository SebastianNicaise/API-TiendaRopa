<?php
require_once "../src/controllers/usuarioControlador.php";
require_once "../src/controllers/ventasControlador.php";
require_once "../src/controllers/productosControlador.php";
require_once "../src/controllers/marcasControlador.php";
require_once "../src/controllers/detallesControlador.php";
require_once "../src/controllers/reportes/topMarcasControlador.php"; 
require_once "../src/controllers/reportes/marcasVentasControlador.php"; 
require_once "../src/controllers/reportes/prendasStockControlador.php"; 
//obtenemos en una variable el método de trabajo; get, put, delete, push
$method = $_SERVER['REQUEST_METHOD'];
//$_SERVER[INFORMACIÓN DEL SERVIDOR QUE DESEAMOS]: Variable reservada para obtener la información del array del servidor

class Response {
    public static function json($data, $status = 200) {
        header("Content-Type: application/json");
        http_response_code($status);
        echo json_encode($data);
    }
}


$path = isset($_SERVER['PATH_INFO']) ? trim($_SERVER['PATH_INFO'], '/') : include_once "error/response.html";
// Remueve "/" del inicio


//Path almacena la ruta o archivo desde donde hacemos la petición

//importante anexar el /index.php/+Path utilizado
//por ejemplo: http://localhost/practica2/public/index.php/prueba 

echo $path;
//Mostramos el final de la url

// Divide la ruta por "/" para obtener el endpoint y el posible parámetro
$segments = explode('/', $path);



// Captura la cadena de consulta completa después del "?" (por ejemplo: "id=123&nombre=juan")
$queryString = $_SERVER['QUERY_STRING'];

// Parseamos la cadena de consulta a un arreglo asociativo
parse_str($queryString, $queryParams);

// Extraemos los parámetros de la consulta
$id = isset($queryParams['id']) ? $queryParams['id'] : null;


if ($path == "usuarios") {
    $usuarioController = New usuarioController;
    switch ($method) {
        case 'GET':
            if($id==null){
                $usuarioController ->allUsers();
            }else{
                $usuarioController ->getById($id);
            }
            break;
        case 'POST':
            $usuarioController->postUser();
            break;
        case 'PUT':
            $usuarioController->updateUser($id);
            break;
        case 'DELETE':
            $usuarioController->delete($id);
            break;
        default:
            Response::json(['error' => 'Metodo no permitido'], 405);
    }
}elseif ($path == "ventas") {
    $ventaController = New ventasController;
        switch ($method) {
            case 'GET':
                if($id==null){
                    $ventaController ->allSales();
                }else{
                    $ventaController ->SalesById($id);
                }
                break;
            case 'POST':
                $ventaController->postSale();
                break;
            case 'PUT':
                $ventaController->updateSale($id);
                break;
            case 'DELETE':
                $ventaController->delete($id);
                break;
            default:
                Response::json(['error' => 'Metodo no permitido'], 405);
        }

    }elseif ($path == "productos") {
        $productoController = New productosController;
            switch ($method) {
                case 'GET':
                    if($id==null){
                        $productoController ->allProducts();
                    }else{
                        $productoController ->productsById($id);
                    }
                    break;
                case 'POST':
                    $productoController->postProduct();
                    break;
                case 'PUT':
                    $productoController->updateProduct($id);
                    break;
                case 'DELETE':
                    $productoController->delete($id);
                    break;
                default:
                    Response::json(['error' => 'Metodo no permitido'], 405);
            }

        }elseif ($path == "marcas") {
            $marcaController = New marcasController;
                switch ($method) {
                    case 'GET':
                        if($id==null){
                            $marcaController ->allBrands();
                        }else{
                            $marcaController ->brandsById($id);
                        }
                        break;
                    case 'POST':
                        $marcaController->postBrand();
                        break;
                    case 'PUT':
                        $marcaController->updateBrand($id);
                        break;
                    case 'DELETE':
                        $marcaController->delete($id);
                        break;
                    default:
                        Response::json(['error' => 'Metodo no permitido'], 405);
                }

            }elseif ($path == "detalles") {
                $detalleController = New detallesController;
                    switch ($method) {
                        case 'GET':
                            if($id==null){
                                $detalleController ->allDetails();
                            }else{
                                $detalleController ->detailsById($id);
                            }
                            break;
                        case 'POST':
                            $detalleController->postDetail();
                            break;
                        case 'PUT':
                            $detalleController->updateDetail($id);
                            break;
                        case 'DELETE':
                            $detalleController->delete($id);
                            break;
                        default:
                            Response::json(['error' => 'Metodo no permitido'], 405);
                    }
                }elseif ($path == "topMarcas") {
                    $topMarcaController = New topMarcasController;
                        switch ($method) {
                            case 'GET':
                                    $topMarcaController ->allTopBrands();
                                break;
                            default:
                                Response::json(['error' => 'Metodo no permitido'], 405);
                        }
                }elseif ($path == "marcasVentas") {
                    $marcasVentaController = New marcasVentasController;
                        switch ($method) {
                            case 'GET':
                                    $marcasVentaController ->allBrandSales();
                                break;
                            default:
                                Response::json(['error' => 'Metodo no permitido'], 405);
                        }
                    }elseif ($path == "prendasStock") {
                        $prendasStockController = New prendasStocksController;
                            switch ($method) {
                                case 'GET':
                                        $prendasStockController ->allStockClothes();
                                    break;
                                default:
                                    Response::json(['error' => 'Metodo no permitido'], 405);
                            }

}else{
    include "error/response.html";
}

?>