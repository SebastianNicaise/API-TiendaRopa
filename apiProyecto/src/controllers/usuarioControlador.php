<?php

require_once "../src/models/usuarioModel.php";

class usuarioController{
    private $modeloUsuario;

    public function __construct() {
        $this->modeloUsuario = new Usuario();
    }
    public function allUsers(){
        echo json_encode(["Resultado"=> $this->modeloUsuario->todosUsuarios()]);
    }
    public function getById($id){
        $modeloUsuario=new usuario;
        echo json_encode(["Resultado"=> $this->modeloUsuario->usuarioPorId($id)]);

    }
    public function postUser() {
        $data = json_decode(file_get_contents('php://input'), true);
        echo json_encode($this->modeloUsuario->nuevoUsuario($data));
    }

}