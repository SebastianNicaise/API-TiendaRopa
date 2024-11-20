<?php
require_once "../src/db/db.php";

    class detalle{
        private $db;
        public function __construct(){ //lo primero que se ejecuta, es importante ya que puede frenar la ejecución del resto de funciones
			$this->db=new Database;
			
}

    public function todosdetalles(){
        $consulta=$this->db->connect()->query("SELECT * FROM detalles_venta");
        $consulta->execute();
        return $consulta->fetchAll();
    }
    
public function detallePorId($id){
        $consulta=$this->db->connect()->prepare("SELECT id, venta_id, producto_id FROM `detalles_venta` WHERE id = ?");
        $consulta->execute([$id]);
        return $consulta->fetch();

    }
    public function nuevodetalle($data) {
        $inserta = $this->db->connect()->prepare("INSERT INTO detalles_venta (venta_id, producto_id, cantidad, precio_unitario) VALUES (?, ?, ?, ?)");
        $inserta->execute([$data['venta_id'], $data['producto_id'], $data['cantidad'], $data['precio_unitario']]);
        return ['id' => $this->db->connect()->lastInsertId()];
    }

    }

    
?>
