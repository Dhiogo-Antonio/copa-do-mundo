<?php
echo "<section id='grupos'>";

echo "<h1>Grupos Cadastradas</h1>";

if(empty($grupos)){
    echo "<div class='links'>";
    echo "<p>Nenhum grupo encontrado!</p>";
    echo "<br>
<a href='cadastroGrupos.php' class='cadastro'>Cadastrar grupo</a>";
echo "</div>";
    return;
}

echo "<table class='tabela-grupos'>";
echo "<thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
      </thead>
      <tbody>";

foreach($grupos as $grupo){
    $id = $grupo['id'];

    echo "<tr>";
    echo "<td>{$id}</td>";
    echo "<td>{$grupo['nome']}</td>";
    echo "<td>
            <a href='editargrupo.php?id={$id}' class='btn-editar'>Editar</a> |
            <a href='deletargrupo.php?id={$id}' class='btn-deletar' 
               onclick=\"return confirm('Tem certeza que deseja excluir este grupo?')\">Deletar</a> |
            <a href='cadastroGrupos.php' class='btn-cadastrar'>Cadastrar</a>
          </td>";
    echo "</tr>";
}

echo "</tbody></table>";
echo "</section>";
?>
