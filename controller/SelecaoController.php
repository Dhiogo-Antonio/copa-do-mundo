<?php

require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/model/SelecaoModel.php";

class SelecaoController {

    private $selecaoModel;

    public function __construct($pdo) {
        $this->selecaoModel = new SelecaoModel($pdo);
    }

    public function cadastrar($nome, $continente) {
        return $this->selecaoModel->cadastrar($nome, $continente);
    }

    public function listar() {
    return $this->selecaoModel->listarTodos();
}


}
