<?php
require_once "C:/turma2/turma2/xampp/htdocs/copa-do-mundo/db/database.php";
require_once "C:/turma2/turma2/xampp/htdocs/copa-do-mundo/controller/SelecaoController.php";
require_once "C:/turma2/turma2/xampp/htdocs/copa-do-mundo/controller/GruposController.php";

$gruposController = new GruposController($pdo);

$grupos = $gruposController->listar();

$selecaoController = new SelecaoController($pdo);



$id = $_GET['id'] ?? null;

if(!$id){
    die("ID inválido");
}

$selecao = $selecaoController->buscar($id);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $selecaoController->atualizar(
        $id,
        $_POST['nome'],
        $_POST['continente'],
      intval($_POST['grupo_id'])
  
    );

    header("Location: index.php");
    exit;
}
?>

<head>
    <title>Editar Seleção</title>
</head>

<link rel="stylesheet" href="css/style2.css">


<form method="POST">
    Nome: <input type="text" name="nome" value="<?= $selecao['nome'] ?>"><br><br>

    Continente: <input type="text" name="continente" value="<?= $selecao['continente'] ?>"><br><br>

   <select name="grupo_id" required>
    <?php foreach ($grupos as $grupo): ?>
       <option value="<?= $grupo['id']; ?>"
    <?= ($grupo['id'] == $selecao['grupo_id']) ? 'selected' : '' ?>>
    Grupo <?= $grupo['nome']; ?>
</option>
    <?php endforeach; ?>
</select>
<br><br>
    <button type="submit">Atualizar</button>
    <a href="index.php" class="btn-voltar">Voltar</a>
</form>


  
