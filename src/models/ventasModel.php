<?php
require_once "../src/db/db.php";

    class venta{
        private $db;
        public function __construct(){ //lo primero que se ejecuta, es importante ya que puede frenar la ejecución del resto de funciones
			$this->db=new Database;
			
}

    public function todasVentas(){
        $consulta=$this->db->connect()->query("SELECT * FROM Ventas");
        $consulta->execute();
        return $consulta->fetchAll();
    }
    
public function ventaPorId($id){
        $consulta=$this->db->connect()->prepare("SELECT id, usuario_id FROM `ventas` WHERE id = ?");
        $consulta->execute([$id]);
        return $consulta->fetch();

    }
    public function nuevaVenta($data) {
        $inserta = $this->db->connect()->prepare("INSERT INTO ventas (usuario_id, fecha_venta, total) VALUES (?, ?, ?)");
        $inserta->execute([$data['usuario_id'], $data['fecha_venta'], $data['total']]);
        return ['id' => $this->db->connect()->lastInsertId()];
    }

    }

    
?>
