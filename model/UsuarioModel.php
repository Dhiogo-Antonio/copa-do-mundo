<?php

class UsuarioModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function buscarTodos(){
    $sql = "
        SELECT 
            u.id,
            u.nome,
            u.email,
            s.nome AS selecao_nome
        FROM usuarios u
        LEFT JOIN selecoes s 
            ON u.selecao_id = s.id
        ORDER BY u.id DESC
    ";

    $stmt = $this->pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

   public function cadastrar($nome, $idade, $selecao, $cargo, $email, $senha) {
    $sql = "INSERT INTO usuarios (nome, idade, selecao_id, cargo, email, senha) VALUES (:nome, :idade, :selecao_id, :cargo, :email, :senha)";

    $stmt = $this->pdo->prepare($sql);

    return $stmt->execute([
        ':nome' => $nome,
        ':idade' => $idade,
        ':selecao_id' => $selecao,
        ':cargo' => $cargo,
        ':email' => $email,
        ':senha' => $senha
    ]);
   }
  


public function buscarPorId($id){
    $sql = "SELECT * FROM usuarios WHERE id = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function atualizar($id, $nome, $idade, $selecao_id, $cargo, $email){
    $sql = "UPDATE usuarios 
            SET nome = :nome,
                idade = :idade,
                selecao_id = :selecao_id,
                cargo = :cargo,
                email = :email
            WHERE id = :id";

    $stmt = $this->pdo->prepare($sql);

    return $stmt->execute([
        ':id' => $id,
        ':nome' => $nome,
        ':idade' => $idade,
        ':selecao_id' => $selecao_id,
        ':cargo' => $cargo,
        ':email' => $email
    ]);
}

public function deletar($id){
    $sql = "DELETE FROM usuarios WHERE id = :id";
    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute([':id' => $id]);
}

}