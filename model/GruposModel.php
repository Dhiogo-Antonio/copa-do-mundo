<?php


class GruposModel{

    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function cadastrar($nome){
        $sql = "INSERT INTO grupos (nome) VALUES (:nome)";
    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute([
        ':nome' => $nome
    ]);
    }

    public function listar() {
    $sql = "SELECT id, nome FROM grupos ORDER BY nome ASC";
    return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}


}

?>