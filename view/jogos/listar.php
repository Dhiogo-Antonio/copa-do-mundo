<?php

if (empty($jogos)) {
    echo "<p>Nenhum jogo encontrado</p>";
    return;
}

echo "<table border='1' cellpadding='5' cellspacing='0'>";

echo "<tr>
        <th>ID</th>
        <th>Grupo</th>
        <th>Casa</th>
        <th>Placar</th>
        <th>Fora</th>
        <th>Data</th>
        <th>Status</th>
        <th>Ações</th>
      </tr>";

foreach ($jogos as $jogo) {

    $id = $jogo['id'];

    echo "<tr>";
    echo "<td>{$id}</td>";
    echo "<td>Grupo {$jogo['grupo_nome']}</td>";
    echo "<td>{$jogo['casa_nome']}</td>";
    echo "<td>{$jogo['gols_casa']} x {$jogo['gols_fora']}</td>";
    echo "<td>{$jogo['fora_nome']}</td>";
    echo "<td>{$jogo['data_jogo']}</td>";
    echo "<td>{$jogo['status']}</td>";
    
    echo "<td>
            <a href='jogos/finalizar.php?id={$id}'>Finalizar</a> |
            <a href='deletar.php?id={$id}'
               onclick=\"return confirm('Tem certeza que deseja excluir este jogo?')\">
               Deletar
            </a> |
            <a href='cadastrar.php'>Cadastrar</a>
          </td>";

    echo "</tr>";
}

echo "</table>";
?>
