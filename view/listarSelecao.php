<?php
echo"<section id='#selecoes'>";
if(empty($selecoes)){
    echo "<p>Nenhuma seleção encontrada</p>";
    
    return;
}

echo "<table border='1' cellpadding='5' cellspacing='0'>";


echo "<tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Continente</th>
        <th>Grupo</th>
        <th>Pontos</th>
        <th>Vitórias</th>
        <th>Empates</th>
        <th>Derrotas</th>
        <th>Gols Marcados</th>
        <th>Gols Sofridos</th>
        <th>Saldo de Gols</th>
        <th>Ações</th>
      </tr>";

foreach($selecoes as $selecao){
    $id = $selecao['id'];

    echo "<tr>";
    echo "<td>{$id}</td>";
    echo "<td>{$selecao['nome']}</td>";
    echo "<td>{$selecao['continente']}</td>";
    echo "<td>{$selecao['grupo_id']}</td>";
    echo "<td>".($selecao['pontos'] ?? 'Sem pontos')."</td>";
    echo "<td>".($selecao['vitorias'] ?? 'Nenhuma partida ganha')."</td>";
    echo "<td>".($selecao['empates'] ?? 'Sem empates')."</td>";
    echo "<td>".($selecao['derrotas'] ?? 'Sem derrotas')."</td>";
    echo "<td>".($selecao['gols_marcados'] ?? 'Sem gols marcados')."</td>";
    echo "<td>".($selecao['gols_sofridos'] ?? 'Sem gols sofridos')."</td>";
    echo "<td>".($selecao['saldo_gols'] ?? 'Sem saldo de gols')."</td>";
  
    echo "<td>
            <a href='editarselecao.php?id={$id}'>Editar</a> |
            <a href='deletarselecao.php?id={$id}' 
               onclick=\"return confirm('Tem certeza que deseja excluir esta seleção?')\">
               Deletar
            </a> |
            <a href='cadastroSelecao.php'>Cadastrar</a>
          </td>";
    echo "</tr>";
}

echo "</table>";

echo "</section>";

?>