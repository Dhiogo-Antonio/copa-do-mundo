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
    public function login($email, $senha) {
        $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':email' => $email,
            ':senha' => $senha
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
       
}
}