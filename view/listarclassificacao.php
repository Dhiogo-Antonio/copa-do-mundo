<?php
echo"<section id='#classificacoes'>";
if(empty($classificacao)){
    echo "<p>Nenhuma classificação encontrada</p>";
    
    return;
}

echo "<table border='1' cellpadding='5' cellspacing='0'>";


echo "<tr>
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
      </tr>";

foreach($classificacao as $classificacoes){
    $id = $classificacoes['id'];

    echo "<tr>";
    echo "<td>{$id}</td>";
    echo "<td>{$classificacoes['grupo_id']}</td>";
    echo "<td>{$classificacoes['selecao_id']}</td>";
    echo "<td>".($classificacoes['pontos'] ?? 'Sem pontos')."</td>";
    echo "<td>".($classificacoes['jogos'] ?? 'Sem jogos')."</td>";
    echo "<td>".($classificacoes['vitorias'] ?? 'Nenhuma partida ganha')."</td>";
    echo "<td>".($classificacoes['empates'] ?? 'Sem empates')."</td>";
    echo "<td>".($classificacoes['derrotas'] ?? 'Sem derrotas')."</td>";
    echo "<td>".($classificacoes['gols_pro'] ?? 'Sem gols marcados')."</td>";
    echo "<td>".($classificacoes['gols_contra'] ?? 'Sem gols sofridos')."</td>";
    echo "<td>".($classificacoes['saldo_gols'] ?? 'Sem saldo de gols')."</td>";
    echo "</tr>";
}
echo "</table>";

echo "</section>";

?>