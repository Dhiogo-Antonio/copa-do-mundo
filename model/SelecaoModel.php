<?php

 
class SelecaoModel{
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

   public function cadastrar($nome, $continente, $grupo_id){
    $sql = "INSERT INTO selecoes (nome, continente, grupo_id) VALUES (:nome, :continente, :grupo_id)";
    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute([
        ':nome' => $nome,
        ':continente' => $continente,
        ':grupo_id' => $grupo_id
        
    ]);
}

public function listarTodos() {
    $sql = "SELECT id, nome FROM selecoes ORDER BY nome ASC";
    return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}


}


?>