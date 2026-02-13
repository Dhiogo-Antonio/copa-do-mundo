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

            if (isset($jogo['status']) && $jogo['status'] === 'finalizado') {
                $this->pdo->rollBack();
                return true;
            }

            $sql = "UPDATE jogos 
                    SET gols_casa = :gc,
                        gols_fora = :gf,
                        status = 'finalizado'
                    WHERE id = :id
                      AND status = 'agendado'";
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

            if ($stmt->rowCount() === 0) {
                // Já finalizado por outra chamada; evita duplicidade
                $this->pdo->rollBack();
                return true;
            }

            $grupo = (int) $jogo['grupo_id'];
            $casaId = (int) $jogo['selecao_casa_id'];
            $foraId = (int) $jogo['selecao_fora_id'];

            $this->garantirClassificacao($grupo, $casaId);
            $this->garantirClassificacao($grupo, $foraId);

            $j_inc = 1;
            $casa_v = 0; $casa_e = 0; $casa_d = 0; $casa_p = 0;
            $fora_v = 0; $fora_e = 0; $fora_d = 0; $fora_p = 0;

            if ((int)$gols_casa > (int)$gols_fora) {
                $casa_v = 1; $casa_p = 3; $fora_d = 1;
            } elseif ((int)$gols_casa < (int)$gols_fora) {
                $fora_v = 1; $fora_p = 3; $casa_d = 1;
            } else {
                $casa_e = 1; $fora_e = 1; $casa_p = 1; $fora_p = 1;
            }

            $sqlUpdate = "UPDATE classificacao
                          SET jogos = jogos + :j_inc,
                              vitorias = vitorias + :v_inc,
                              empates = empates + :e_inc,
                              derrotas = derrotas + :d_inc,
                              pontos = pontos + :p_inc,
                              gols_pro = gols_pro + :gp,
                              gols_contra = gols_contra + :gc,
                              saldo_gols = saldo_gols + (:gp - :gc)
                          WHERE grupo_id = :grupo
                            AND selecao_id = :selecao";

            $stmtCasa = $this->pdo->prepare($sqlUpdate);
            $okCasa = $stmtCasa->execute([
                ':j_inc' => $j_inc,
                ':v_inc' => $casa_v,
                ':e_inc' => $casa_e,
                ':d_inc' => $casa_d,
                ':p_inc' => $casa_p,
                ':gp' => (int) $gols_casa,
                ':gc' => (int) $gols_fora,
                ':grupo' => $grupo,
                ':selecao' => $casaId
            ]);

            $stmtFora = $this->pdo->prepare($sqlUpdate);
            $okFora = $stmtFora->execute([
                ':j_inc' => $j_inc,
                ':v_inc' => $fora_v,
                ':e_inc' => $fora_e,
                ':d_inc' => $fora_d,
                ':p_inc' => $fora_p,
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
