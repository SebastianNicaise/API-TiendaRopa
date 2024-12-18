<?php
require_once "../src/db/db.php";
class marcasVenta{
    private $db;
    public function __construct(){ //lo primero que se ejecuta, es importante ya que puede frenar la ejecución del resto de funciones
        $this->db=new Database;
        
}

public function todasmarcasVentas(){
    $consulta=$this->db->connect()->query("SELECT * FROM marcas_con_ventas");
    $consulta->execute();
    return $consulta->fetchAll();
}
}
?>