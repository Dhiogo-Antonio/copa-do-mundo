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
        try {
            $this->pdo->beginTransaction();

            $jogo = $this->buscarPorId($id);
            if (!$jogo) {
                $this->pdo->rollBack();
                return false;
            }

            $sql = "UPDATE jogos 
                    SET gols_casa = :gc,
                        gols_fora = :gf,
                        status = 'finalizado'
                    WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $okJogo = $stmt->execute([
                ':gc' => $gols_casa,
                ':gf' => $gols_fora,
                ':id' => $id
            ]);

            if (!$okJogo) {
                $this->pdo->rollBack();
                return false;
            }

            $grupo = (int) $jogo['grupo_id'];
            $casaId = (int) $jogo['selecao_casa_id'];
            $foraId = (int) $jogo['selecao_fora_id'];

            $this->garantirClassificacao($grupo, $casaId);
            $this->garantirClassificacao($grupo, $foraId);

            $sqlUpdate = "UPDATE classificacao
                          SET gols_pro = gols_pro + :gp,
                              gols_contra = gols_contra + :gc,
                              saldo_gols = saldo_gols + (:gp - :gc)
                          WHERE grupo_id = :grupo
                            AND selecao_id = :selecao";

            $stmtCasa = $this->pdo->prepare($sqlUpdate);
            $okCasa = $stmtCasa->execute([
                ':gp' => (int) $gols_casa,
                ':gc' => (int) $gols_fora,
                ':grupo' => $grupo,
                ':selecao' => $casaId
            ]);

            $stmtFora = $this->pdo->prepare($sqlUpdate);
            $okFora = $stmtFora->execute([
                ':gp' => (int) $gols_fora,
                ':gc' => (int) $gols_casa,
                ':grupo' => $grupo,
                ':selecao' => $foraId
            ]);

            if (!$okCasa || !$okFora) {
                $this->pdo->rollBack();
                return false;
            }

            $this->pdo->commit();
            return true;
        } catch (Exception $e) {
            if ($this->pdo->inTransaction()) {
                $this->pdo->rollBack();
            }
            return false;
        }
    }

    public function deletar($id) {
    $sql = "DELETE FROM jogos WHERE id = :id";
    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute([':id' => $id]);
}


    private function garantirClassificacao($grupo_id, $selecao_id) {
        $sql = "SELECT id FROM classificacao WHERE grupo_id = :grupo AND selecao_id = :selecao LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':grupo' => $grupo_id,
            ':selecao' => $selecao_id
        ]);
        $existe = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$existe) {
            $sqlIns = "INSERT INTO classificacao (grupo_id, selecao_id, pontos, jogos, vitorias, empates, derrotas, gols_pro, gols_contra, saldo_gols)
                       VALUES (:grupo, :selecao, 0, 0, 0, 0, 0, 0, 0, 0)";
            $stmtIns = $this->pdo->prepare($sqlIns);
            $stmtIns->execute([
                ':grupo' => $grupo_id,
                ':selecao' => $selecao_id
            ]);
        }
    }

}




?>
