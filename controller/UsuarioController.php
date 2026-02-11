<?php

require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/model/UsuarioModel.php";

class UsuarioController{
    private $usuarioModel;

    public function __construct($pdo){
        $this->usuarioModel = new UsuarioModel($pdo);
    }

    public function cadastrar($nome, $idade, $selecao, $cargo, $email, $senha){
        return $this->usuarioModel->cadastrar($nome, $idade, $selecao, $cargo, $email, $senha);
    }
 public function login($email, $senha){
        return $this->usuarioModel->login($email, $senha);
    }
    
}

?>