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
    

    public function actualizarMarca($id, $data){
        // Verificar que se recibieron los datos correctamente
        if (isset($data['nombre'], $data['descripcion']) && !empty($data['nombre']) && !empty($data['descripcion'])) {
            // Proceder con la actualización solo si los datos son válidos
            try {
                $consulta = $this->db->connect()->prepare("UPDATE marcas SET nombre=?, descripcion=? WHERE id=?" );
                $consulta->execute([$data['nombre'], $data['descripcion'], $id]);
    
                // Retornar el número de filas afectadas (si es 0, significa que no hubo cambios)
                return $consulta->rowCount();
            } catch (PDOException $e) {
                // Si ocurre algún error en la consulta, capturarlo y retornar un mensaje de error
                return 'Error en la consulta: ' . $e->getMessage();
            }
        } else {
            // Si no se recibieron los datos correctamente, retornar 0
            return 0;
        }
    }

}
    

    
?>
