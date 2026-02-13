<?php

require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/model/ClassificacaoModel.php";

class ClassificacaoController {

    private $classificacaoModel;

    public function __construct($pdo) {
        $this->classificacaoModel = new ClassificacaoModel($pdo);
    }

    public function listar($grupo_id) {
        $classificacao = $this->classificacaoModel->listarPorGrupo($grupo_id);
        include "C:/Turma2/xampp/htdocs/copa-do-mundo/view/listar.php";
    }

  public function casa() {
    $classificacao = $this->classificacaoModel->listarTodos();
    require __DIR__ . '/../view/listarclassificacao.php';
}


}