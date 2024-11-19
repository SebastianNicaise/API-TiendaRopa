<?php
require_once "../src/db/db.php";
class prendasStock{
    private $db;
    public function __construct(){ //lo primero que se ejecuta, es importante ya que puede frenar la ejecución del resto de funciones
        $this->db=new Database;
        
}

public function todasprendasStocks(){
    $consulta=$this->db->connect()->query("SELECT * FROM prendas_vendidas_stock");
    $consulta->execute();
    return $consulta->fetchAll();
}
}
?>