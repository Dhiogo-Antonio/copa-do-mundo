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
    return $this->selecaoModel->listarTodos();
}


}
