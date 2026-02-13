<?php

require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/model/JogosModel.php";
require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/model/selecaoModel.php";

class JogosController {

    private $jogosModel;

    public function __construct($pdo) {
        $this->jogosModel = new JogosModel($pdo);
    }

    public function buscarPorId($id) {
    return $this->jogosModel->buscarPorId($id);
}


   public function listar() {
    $jogos = $this->jogosModel->listar();
    include "C:/Turma2/xampp/htdocs/copa-do-mundo/view/jogos/listar.php";
}



    public function cadastrar($grupo, $casa, $fora, $data) {
        return $this->jogosModel->cadastrar($grupo, $casa, $fora, $data);
    }

   public function finalizar($id, $golsCasa, $golsFora) {
    return $this->jogosModel->finalizar($id, $golsCasa, $golsFora);
}

}