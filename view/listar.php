<?php

if(empty($usuarios)){
    echo "<p>Nenhum usuário encontrado</p>";
    
    return;
}

echo "<table border='1' cellpadding='5' cellspacing='0'>";


echo "<tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Seleção</th>
        <th>Ações</th>
      </tr>";

foreach($usuarios as $usuario){
    $id = $usuario['id'];

    echo "<tr>";
    echo "<td>{$id}</td>";
    echo "<td>{$usuario['nome']}</td>";
    echo "<td>{$usuario['email']}</td>";
    echo "<td>".($usuario['selecao_nome'] ?? 'Sem seleção')."</td>";
    echo "<td>
            <a href='editar.php?id={$id}'>Editar</a> |
            <a href='deletar.php?id={$id}' 
               onclick=\"return confirm('Tem certeza que deseja excluir este usuário?')\">
               Deletar
            </a> |
            <a href='View/Usuario/cadastrar.php'>Cadastrar</a>
          </td>";
    echo "</tr>";
}

echo "</table>";



?>