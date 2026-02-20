<?php

require_once "C:/turma2/xampp/htdocs/copa-do-mundo/model/GruposModel.php";

class GruposController{
    private $gruposModel;

    public function __construct($pdo) {
        $this->gruposModel = new GruposModel($pdo);
    }

   public function cadastrar($nome){
    $resultado = $this->gruposModel->cadastrar($nome);

    if($resultado === "duplicado"){
        return "duplicado";
    }

    return $resultado;
}

 public function buscartudo() {
    $grupos = $this->gruposModel->buscartudo();
    include "C:/turma2/xampp/htdocs/copa-do-mundo/view/listargrupos.php";
}

public function deletar($id) {
    return $this->gruposModel->deletar($id);
}

    public function buscar($id){
    return $this->gruposModel->buscarPorId($id);
}

   public function atualizar($id, $nome){
    $resultado = $this->gruposModel->atualizar($id, $nome);

    if($resultado === "duplicado"){
        return "duplicado";
    }

    return $resultado;
}
 public function listar() {
    return $this->gruposModel->listar();
}
}
 
?>