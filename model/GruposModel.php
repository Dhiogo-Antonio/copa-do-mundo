<?php


class GruposModel
{

    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function listar()
    {
        $sql = "SELECT id, nome FROM grupos ORDER BY nome ASC";
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cadastrar($nome)
    {
        try {
            $sql = "INSERT INTO grupos (nome) VALUES (:nome)";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([':nome' => $nome]);
        } catch (PDOException $e) {

            if ($e->getCode() == 23000) {
                return "duplicado";
            }

            throw $e;
        }
    }


    public function buscartudo()
    {
        $sql = "SELECT id, nome FROM grupos ORDER BY nome ASC";
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    public function deletar($id)
    {
        $sql = "DELETE FROM grupos WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM grupos WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function atualizar($id, $nome)
    {
        try {
            $sql = "UPDATE grupos 
                SET nome = :nome
                WHERE id = :id";

            $stmt = $this->pdo->prepare($sql);

            return $stmt->execute([
                ':id' => $id,
                ':nome' => $nome
            ]);
        } catch (PDOException $e) {

            if ($e->getCode() == 23000) {
                return "duplicado";
            }

            throw $e;
        }
    }
}
