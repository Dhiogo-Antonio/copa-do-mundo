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

public function buscarSelecao() {
    $sql = "SELECT * FROM selecoes ORDER BY nome ASC";
    return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}


public function listarTodos() {
    $sql = "SELECT 
                id,
                nome,
                continente,
                grupo_id,
                pontos,
                vitorias,
                empates,
                derrotas,
                gols_marcados,
                gols_sofridos,
                saldo_gols
            FROM selecoes
            ORDER BY nome ASC";

    return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}



public function deletar($id){
    $sql = "DELETE FROM selecoes WHERE id = :id";
    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute([':id' => $id]);
}


public function buscarPorId($id){
    $sql = "SELECT * FROM selecoes WHERE id = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function atualizar($id, $nome, $continente, $grupo_id){
    $sql = "UPDATE usuarios 
            SET nome = :nome,
                continente = :continente,
                grupo_id = :grupo_id
            WHERE id = :id";

    $stmt = $this->pdo->prepare($sql);

    return $stmt->execute([
        ':id' => $id,
        ':nome' => $nome,
        ':continente' => $continente,
        ':grupo_id' => $grupo_id,
       
    ]);
}

}


?>