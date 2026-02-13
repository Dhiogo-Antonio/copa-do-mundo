<?php
echo "<section id='selecoes'>";

echo "<h1>Seleções Cadastradas</h1>";

if(empty($selecoes)){
    echo "<div class='links'>";
    echo "<p>Nenhuma seleção encontrada!</p>";
    echo "<br>
<a href='cadastroSelecao.php' class='cadastro'>Cadastrar seleção</a>";
echo "</div>";
    return;
}

echo "<table class='tabela-selecoes'>";
echo "<thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Continente</th>
            <th>Grupo</th>
            <th>Ações</th>
        </tr>
      </thead>
      <tbody>";

foreach($selecoes as $selecao){
    $id = $selecao['id'];

    echo "<tr>";
    echo "<td>{$id}</td>";
    echo "<td>{$selecao['nome']}</td>";
    echo "<td>{$selecao['continente']}</td>";
    echo "<td>{$selecao['grupo_nome']}</td>";
    echo "<td>
            <a href='editarselecao.php?id={$id}' class='btn-editar'>Editar</a> |
            <a href='deletarselecao.php?id={$id}' class='btn-deletar' 
               onclick=\"return confirm('Tem certeza que deseja excluir esta seleção?')\">Deletar</a> |
            <a href='cadastroSelecao.php' class='btn-cadastrar'>Cadastrar</a>
          </td>";
    echo "</tr>";
}

echo "</tbody></table>";
echo "</section>";
?>
