<?php
require_once "../src/db/db.php";

    class marca{
        private $db;
        public function __construct(){ //lo primero que se ejecuta, es importante ya que puede frenar la ejecución del resto de funciones
			$this->db=new Database;
			
}

    public function todasmarcas(){
        $consulta=$this->db->connect()->query("SELECT * FROM marcas");
        $consulta->execute();
        return $consulta->fetchAll();
    }
    
public function marcaPorId($id){
        $consulta=$this->db->connect()->prepare("SELECT id, nombre FROM `marcas` WHERE id = ?");
        $consulta->execute([$id]);
        return $consulta->fetch();

    }
    public function nuevamarca($data) {
        $inserta = $this->db->connect()->prepare("INSERT INTO marcas (nombre, descripcion) VALUES (?, ?)");
        $inserta->execute([$data['nombre'], $data['descripcion']]);
        return ['id' => $this->db->connect()->lastInsertId()];
    }

    // Eliminar 

    public function eliminarMarca($id) {
        $consulta = $this->db->connect()->prepare("DELETE FROM marcas WHERE id = ?");
        return $consulta->execute([$id]);
    }
    

    }

    
?>
