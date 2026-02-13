<?php
echo "<section id='classificacoes'>";

echo "<h1>Classificação</h1>";

if(empty($classificacao)){
    echo "<p>Nenhuma classificação encontrada</p>";
    return;
}

// Começo da tabela estilizada
echo "<table id='classificacao' class='tabela-classificacao'>";
echo "<thead>
        <tr>
            <th>ID</th>
            <th>Grupo</th>
            <th>Seleção</th>
            <th>Pontos</th>
            <th>Jogos</th>
            <th>Vitórias</th>
            <th>Empates</th>
            <th>Derrotas</th>
            <th>Gols Pro</th>
            <th>Gols Contra</th>
            <th>Saldo de Gols</th>
        </tr>
      </thead>
      <tbody>";

foreach($classificacao as $classificacaoItem){
    $id = $classificacaoItem['id'];

    echo "<tr>";
    echo "<td>{$id}</td>";
    echo "<td>{$classificacaoItem['grupo_nome']}</td>";
    echo "<td>{$classificacaoItem['selecao_nome']}</td>";
    echo "<td>".($classificacaoItem['pontos'] ?? '0')."</td>";
    echo "<td>".($classificacaoItem['jogos'] ?? '0')."</td>";
    echo "<td>".($classificacaoItem['vitorias'] ?? '0')."</td>";
    echo "<td>".($classificacaoItem['empates'] ?? '0')."</td>";
    echo "<td>".($classificacaoItem['derrotas'] ?? '0')."</td>";
    echo "<td>".($classificacaoItem['gols_pro'] ?? '0')."</td>";
    echo "<td>".($classificacaoItem['gols_contra'] ?? '0')."</td>";
    echo "<td>".($classificacaoItem['saldo_gols'] ?? '0')."</td>";
    echo "</tr>";
}

echo "</tbody></table>";
echo "</section>";
?>
