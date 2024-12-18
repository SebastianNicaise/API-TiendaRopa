<?php

require_once "../src/models/ventasModel.php";

class ventasController{
    private $modeloVentas;

    public function __construct() {
        $this->modeloVenta = new venta();
    }
    public function allSales(){
        echo json_encode(["Resultado"=> $this->modeloVenta->todasVentas()]);
    }
    public function salesById($id){
        echo json_encode(["Resultado"=> $this->modeloVenta->ventaPorId($id)]);

    }
    public function postSale() {
        $data = json_decode(file_get_contents('php://input'), true);
        echo json_encode($this->modeloVenta->nuevaVenta($data));
    }

    public function updateSale($id){
        $modeloVentas=new venta;
        $data= json_decode(file_get_contents("php://input"),true);
        echo json_encode(["Resultado"=> $modeloVentas->actualizarVenta($id, $data)]);
    }

}