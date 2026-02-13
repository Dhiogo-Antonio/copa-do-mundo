<?php

require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/model/UsuarioModel.php";

class UsuarioController{
    private $usuarioModel;

    public function __construct($pdo){
        $this->usuarioModel = new UsuarioModel($pdo);
    }

    public function listar(){
        $usuarios = $this->usuarioModel->buscarTodos();
       include_once "C:/Turma2/xampp/htdocs/copa-do-mundo/view/listar.php";
       return;
    }

    public function cadastrar($nome, $idade, $selecao, $cargo, $email, $senha){
        return $this->usuarioModel->cadastrar($nome, $idade, $selecao, $cargo, $email, $senha);
    }
 public function login($email, $senha){
        return $this->usuarioModel->login($email, $senha);
    }

    public function buscar($id){
    return $this->usuarioModel->buscarPorId($id);
}

public function atualizar($id, $nome, $idade, $selecao_id, $cargo, $email){
    return $this->usuarioModel->atualizar($id, $nome, $idade, $selecao_id, $cargo, $email);
}

public function deletar($id){
    return $this->usuarioModel->deletar($id);
}

    
}

?>