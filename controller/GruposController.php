<?php

require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/model/GruposModel.php";

class GruposController{
    private $gruposModel;

    public function __construct($pdo) {
        $this->gruposModel = new GruposModel($pdo);
    }

    public function cadastrar($nome){
        return $this->gruposModel->cadastrar($nome);
    }

    public function listar() {
    return $this->gruposModel->listar();
}

}

?>