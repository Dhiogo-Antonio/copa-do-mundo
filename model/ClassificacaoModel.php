<?php

class ClassificacaoModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function listarPorGrupo($grupo_id) {

        $sql = "
            SELECT 
                c.*,
                s.nome AS selecao_nome
            FROM classificacao c
            JOIN selecoes s ON c.selecao_id = s.id
            WHERE c.grupo_id = :grupo
            ORDER BY pontos DESC, saldo_gols DESC, gols_pro DESC
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':grupo' => $grupo_id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function atualizar($grupo_id, $selecao_id, $dados) {

        $sql = "
            UPDATE classificacao
            SET pontos = :pontos,
                jogos = :jogos,
                vitorias = :vitorias,
                empates = :empates,
                derrotas = :derrotas,
                gols_pro = :gp,
                gols_contra = :gc,
                saldo_gols = :saldo
            WHERE grupo_id = :grupo
              AND selecao_id = :selecao
        ";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':pontos' => $dados['pontos'],
            ':jogos' => $dados['jogos'],
            ':vitorias' => $dados['vitorias'],
            ':empates' => $dados['empates'],
            ':derrotas' => $dados['derrotas'],
            ':gp' => $dados['gols_pro'],
            ':gc' => $dados['gols_contra'],
            ':saldo' => $dados['saldo_gols'],
            ':grupo' => $grupo_id,
            ':selecao' => $selecao_id
        ]);
    }
public function listarTodos() {
    $sql = "SELECT 
                id,
                grupo_id,
                selecao_id,
                pontos,
                jogos,
                vitorias,
                empates,
                derrotas,
                gols_pro,
                gols_contra,
                saldo_gols
            FROM classificacao
            ORDER BY id ASC";

    return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}




}
