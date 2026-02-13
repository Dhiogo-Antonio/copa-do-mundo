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
    $sql = "
        SELECT 
            c.id,
            c.grupo_id,
            g.nome AS grupo_nome,
            c.selecao_id,
            s.nome AS selecao_nome,
            c.pontos,
            c.jogos,
            c.vitorias,
            c.empates,
            c.derrotas,
            c.gols_pro,
            c.gols_contra,
            c.saldo_gols
        FROM classificacao c
        INNER JOIN selecoes s ON c.selecao_id = s.id
        INNER JOIN grupos g ON c.grupo_id = g.id
        ORDER BY c.grupo_id ASC, c.pontos DESC, c.saldo_gols DESC, c.gols_pro DESC
    ";

    $stmt = $this->pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}





}
