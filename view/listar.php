<?php
echo "<section id='usuarios'>";

echo "<h1>Gerenciamento de Usuários</h1>";

if(empty($usuarios)){
    echo "<div class='links'>";
    echo "<p>Nenhum usuário encontrado!</p>";
    echo "<br>
<a href='cadastro.php' class='cadastro'>Cadastrar novo usuário</a>";
echo "</div>";
    return;
}

echo "<table class='tabela-usuarios'>";
echo "<thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Seleção</th>
            <th>Ações</th>
        </tr>
      </thead>
      <tbody>";

foreach($usuarios as $usuario){
    $id = $usuario['id'];
    echo "<tr>";
    echo "<td>{$id}</td>";
    echo "<td>{$usuario['nome']}</td>";
    echo "<td>{$usuario['email']}</td>";
    echo "<td>".($usuario['selecao_nome'] ?? 'Sem seleção')."</td>";
    echo "<td>
            <a href='editar.php?id={$id}' class='btn-editar'>Editar</a> |
            <a href='deletar.php?id={$id}' class='btn-deletar' 
               onclick=\"return confirm('Tem certeza que deseja excluir este usuário?')\">Deletar</a> |
            <a href='cadastro.php' class='btn-cadastrar'>Cadastrar</a>
          </td>";
    echo "</tr>";
}

echo "</tbody></table>";
echo "</section>";
?>
