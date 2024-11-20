<?php
require_once "../src/db/db.php";
class topMarca{
    private $db;
    public function __construct(){ //lo primero que se ejecuta, es importante ya que puede frenar la ejecución del resto de funciones
        $this->db=new Database;
        
}

public function todastopMarcas(){
    $consulta=$this->db->connect()->query("SELECT * FROM top_5_marcas_vendidas");
    $consulta->execute();
    return $consulta->fetchAll();
}
}
?>