<?php
require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/db/database.php";
require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/controller/SelecaoController.php";

$selecaoController = new SelecaoController($pdo);
$selecoes = $selecaoController->listar();


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
        $_POST['grupo_id']
    );

    header("Location: index.php");
    exit;
}
?>

<h2>Editar Seleção</h2>

<form method="POST">
    Nome: <input type="text" name="nome" value="<?= $selecao['nome'] ?>"><br><br>

    Continente: <input type="text" name="continente" value="<?= $selecao['continente'] ?>"><br><br>

    Grupo: <input type="number" name="grupo" value="<?= $selecao['grupo_id'] ?>"><br><br>

    <button type="submit">Atualizar</button>
</form>
