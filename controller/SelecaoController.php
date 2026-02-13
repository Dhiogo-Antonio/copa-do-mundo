<?php

require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/model/SelecaoModel.php";

class SelecaoController {

    private $selecaoModel;

    public function __construct($pdo) {
        $this->selecaoModel = new SelecaoModel($pdo);
    }
    

    public function cadastrar($nome, $continente, $grupo_id) {
        return $this->selecaoModel->cadastrar($nome, $continente, $grupo_id);
    }

    public function listar() {
    $selecoes = $this->selecaoModel->listarTodos();
    require __DIR__ . '/../View/listarselecao.php';
}

public function deletar($id){
    return $this->selecaoModel->deletar($id);
}


    public function buscar($id){
    return $this->selecaoModel->buscarPorId($id);
}

    public function atualizar($id, $nome, $continente, $grupo_id){
        return $this->selecaoModel->atualizar($id, $nome, $continente, $grupo_id);
    }






}
