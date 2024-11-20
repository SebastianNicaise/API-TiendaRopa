<?php

require_once "../src/models/productosModel.php";

class productosController{
    private $modeloproductos;

    public function __construct() {
        $this->modeloproducto = new producto();
    }
    public function allProducts(){
        echo json_encode(["Resultado"=> $this->modeloproducto->todosproductos()]);
    }
    public function productsById($id){
        echo json_encode(["Resultado"=> $this->modeloproducto->productoPorId($id)]);

    }
    public function postProduct() {
        $data = json_decode(file_get_contents('php://input'), true);
        echo json_encode($this->modeloproducto->nuevoproducto($data));
    }

    // Eliminar // Eliminar 

    public function delete($id) {
        if (is_null($id)) {
            echo json_encode(['error' => 'ID requerido']);
            return;
        }
    
        $resultado = $this->modeloproducto->eliminarProducto($id);
    
        if ($resultado) {
            echo json_encode(['message' => 'Producto eliminado correctamente']);
        } else {
            echo json_encode(['error' => 'Producto no encontrado o no se pudo eliminar']);
        }
    }

}