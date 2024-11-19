<?php

require_once "../src/models/reportes/prendasStockModel.php";

class prendasStocksController{
    private $modeloprendasStocks;

    public function __construct() {
        $this->modeloprendasStock = new prendasStock();
    }
    public function allStockClothes(){
        echo json_encode(["Resultado"=> $this->modeloprendasStock->todasprendasStocks()]);
    }


}