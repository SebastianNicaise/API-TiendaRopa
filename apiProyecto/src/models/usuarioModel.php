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
        $inserta = $this->db->connect()->prepare("INSERT INTO usuarios (nombre, correo, contraseña, telefono, direccion, fecha_registro) VALUES (?, ?, ?, ?, ?, ?)");
        $inserta->execute([$data['nombre'], $data['correo'], $data['contraseña'], $data['telefono'], $data['direccion'], $data['fecha_registro']]);
        return ['id' => $this->db->connect()->lastInsertId()];
    }

    }

    
?>
