<?php

class UsuarioModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
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
}
