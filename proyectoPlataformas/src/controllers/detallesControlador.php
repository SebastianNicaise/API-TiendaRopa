<?php

require_once "../src/models/detallesModel.php";

class detallesController{
    private $modelodetalles;

    public function __construct() {
        $this->modelodetalle = new detalle();
    }
    public function allDetails(){
        echo json_encode(["Resultado"=> $this->modelodetalle->todosdetalles()]);
    }
    public function detailsById($id){
        echo json_encode(["Resultado"=> $this->modelodetalle->detallePorId($id)]);

    }
    public function postDetail() {
        $data = json_decode(file_get_contents('php://input'), true);
        echo json_encode($this->modelodetalle->nuevodetalle($data));
    }

    public function updateDetail($id){
        $data= json_decode(file_get_contents("php://input"),true);
        echo json_encode([$this->modelodetalle->actualizarDetalle($id, $data)]);
    }

}