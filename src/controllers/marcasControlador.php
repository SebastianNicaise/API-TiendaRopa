<?php

require_once "../src/models/marcasModel.php";

class marcasController{
    private $modelomarcas;

    public function __construct() {
        $this->modelomarca = new marca();
    }
    public function allBrands(){
        echo json_encode(["Resultado"=> $this->modelomarca->todasmarcas()]);
    }
    public function brandsById($id){
        echo json_encode(["Resultado"=> $this->modelomarca->marcaPorId($id)]);

    }
    public function postBrand() {
        $data = json_decode(file_get_contents('php://input'), true);
        echo json_encode($this->modelomarca->nuevamarca($data));
    }

    // Eliminar 

    public function delete($id) {
        if (is_null($id)) {
            echo json_encode(['error' => 'ID requerido']);
            return;
        }
    
        $resultado = $this->modelomarca->eliminarMarca($id);
    
        if ($resultado) {
            echo json_encode(['message' => 'Marca eliminada correctamente']);
        } else {
            echo json_encode(['error' => 'Marca no encontrada o no se pudo eliminar']);
        }
    }
    
    

}