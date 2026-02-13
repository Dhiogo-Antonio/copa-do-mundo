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
        <th>Ações</th>
      </tr>";

foreach($selecoes as $selecao){
    $id = $selecao['id'];

    echo "<tr>";
    echo "<td>{$id}</td>";
    echo "<td>{$selecao['nome']}</td>";
    echo "<td>{$selecao['continente']}</td>";
    echo "<td>{$selecao['grupo_nome']}</td>";

  
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