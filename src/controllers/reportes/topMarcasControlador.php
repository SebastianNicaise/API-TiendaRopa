<?php

require_once "../src/models/reportes/topMarcasModel.php";

class topMarcasController{
    private $modelotopMarcas;

    public function __construct() {
        $this->modelotopMarca = new topMarca();
    }
    public function allTopBrands(){
        echo json_encode(["Resultado"=> $this->modelotopMarca->todastopMarcas()]);
    }


}