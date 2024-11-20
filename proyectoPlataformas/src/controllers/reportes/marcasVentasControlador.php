<?php

require_once "../src/models/reportes/marcasVentasModel.php";

class marcasVentasController{
    private $modelomarcasVentas;

    public function __construct() {
        $this->modelomarcasVenta = new marcasVenta();
    }
    public function allBrandSales(){
        echo json_encode(["Resultado"=> $this->modelomarcasVenta->todasmarcasVentas()]);
    }


}