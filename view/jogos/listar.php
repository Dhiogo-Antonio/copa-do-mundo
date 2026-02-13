<?php

echo "<section id='jogos'>";

if (empty($jogos)) {
    echo "<div class='links'>";
    echo "<p>Nenhum jogo encontrado!</p>";
    echo "<br>
<a href='./jogos/cadastrar.php' class='cadastro'>Cadastrar jogo</a>";
echo "</div>";
    return;
}

echo "<h1>Jogos do dia</h1>";

echo "<table class='tabela-jogos'>";
echo "<thead>
        <tr>
            <th>ID</th>
            <th>Grupo</th>
            <th>Casa</th>
            <th>Placar</th>
            <th>Fora</th>
            <th>Data</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
      </thead>
      <tbody>";

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
            <a href='jogos/finalizar.php?id={$id}' class='btn-finalizar'>Finalizar</a> |
            <a href='deletar.php?id={$id}' class='btn-deletar'
               onclick=\"return confirm('Tem certeza que deseja excluir este jogo?')\">
               Deletar
            </a> |
            <a href='./jogos/cadastrar.php' class='btn-cadastrar'>Cadastrar</a>
          </td>";

    echo "</tr>";
}

echo "</tbody></table>";
?>
