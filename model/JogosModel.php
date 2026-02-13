<?php

class JogosModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

        public function buscarPorId($id){
    $sql = "SELECT * FROM jogos WHERE id = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

    public function listar() {
        $sql = "
            SELECT 
                j.*,
                sc.nome AS casa_nome,
                sf.nome AS fora_nome,
                g.nome AS grupo_nome
            FROM jogos j
            JOIN selecoes sc ON j.selecao_casa_id = sc.id
            JOIN selecoes sf ON j.selecao_fora_id = sf.id
            JOIN grupos g ON j.grupo_id = g.id
            ORDER BY j.id DESC
        ";

        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }



    public function cadastrar($grupo_id, $casa_id, $fora_id, $data) {
        $sql = "INSERT INTO jogos 
                (grupo_id, selecao_casa_id, selecao_fora_id, data_jogo)
                VALUES (:grupo, :casa, :fora, :data)";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':grupo' => $grupo_id,
            ':casa' => $casa_id,
            ':fora' => $fora_id,
            ':data' => $data
        ]);
    }

    public function finalizar($id, $gols_casa, $gols_fora) {
        $sql = "UPDATE jogos 
                SET gols_casa = :gc,
                    gols_fora = :gf,
                    status = 'finalizado'
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':gc' => $gols_casa,
            ':gf' => $gols_fora,
            ':id' => $id
        ]);
    }

    public function deletar($id) {
    $sql = "DELETE FROM jogos WHERE id = :id";
    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute([':id' => $id]);
}

}




?>