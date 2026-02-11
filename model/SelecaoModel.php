<?php

 
class SelecaoModel{
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

   public function cadastrar($nome, $continente){
    $sql = "INSERT INTO selecoes (nome, continente) VALUES (:nome, :continente)";
    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute([
        ':nome' => $nome,
        ':continente' => $continente
        
    ]);
}

public function listarTodos() {
    $sql = "SELECT id, nome FROM selecoes ORDER BY nome ASC";
    return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}


}


?>