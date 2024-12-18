<?php
require_once "../src/db/db.php";

    class usuario{
        private $db;
        public function __construct(){ //lo primero que se ejecuta, es importante ya que puede frenar la ejecución del resto de funciones
			$this->db=new Database;
			
}

    public function todosUsuarios(){
        $consulta=$this->db->connect()->query("SELECT * FROM USUARIOS");
        $consulta->execute();
        return $consulta->fetchAll();
    }
    
public function usuarioPorId($id){
        $consulta=$this->db->connect()->prepare("SELECT nombre FROM `usuarios` WHERE id = ?");
        $consulta->execute([$id]);
        return $consulta->fetch();

    }
    public function nuevoUsuario($data) {
        $consulta = $this->db->connect()->prepare("INSERT INTO usuarios (nombre, correo, contraseña, telefono, direccion, fecha_registro) VALUES (?, ?, ?, ?, ?, ?)");
        $consulta->execute([$data['nombre'], $data['correo'], $data['contraseña'], $data['telefono'], $data['direccion'], $data['fecha_registro']]);
        return ['id' => $this->db->connect()->lastInsertId()];
    }

    // Eliminar Usuario 

    public function eliminarUsuario($id) {
        $consulta = $this->db->connect()->prepare("DELETE FROM usuarios WHERE id = ?");
        return $consulta->execute([$id]);
    }

    public function actualizarUsuario($id, $data){
        $consulta = $this->db->connect()->prepare("UPDATE usuarios SET nombre=?, correo=?, contraseña=?, telefono=?, direccion=?, fecha_registro=? WHERE id=?" );
        $consulta->execute([$data['nombre'], $data['correo'], $data['contraseña'], $data['telefono'], $data['direccion'], $data['fecha_registro'], $id]);
        return $consulta->rowCount();
    }    

    }

    
?>
