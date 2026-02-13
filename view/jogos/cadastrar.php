<?php
require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/db/database.php";
require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/controller/SelecaoController.php";
require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/controller/GruposController.php";

$selecaoController = new SelecaoController($pdo);
$selecoes = $selecaoController->buscarSelecao();

$gruposController = new GruposController($pdo);

$grupos = $gruposController->listar();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style2.css">
    <title>Document</title>
</head>

<body>
    <h2>Cadastrar Jogo</h2>

    <form method="POST">

        <label>Grupo:</label>
        <select name="grupo_id" required>
            <option value="">Selecione</option>
            <?php foreach ($grupos as $grupo): ?>
                <option value="<?= $grupo['id']; ?>">
                    Grupo <?= $grupo['nome']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br><br>

        <label>Time Casa:</label>
        <select name="casa_id" required>
            <?php foreach ($selecoes as $s): ?>
                <option value="<?= $s['id']; ?>">
                    <?= $s['nome']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br><br>

        <label>Time Fora:</label>
        <select name="fora_id" required>
            <?php foreach ($selecoes as $s): ?>
                <option value="<?= $s['id']; ?>">
                    <?= $s['nome']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br><br>

        <label>Data do Jogo:</label>
        <input type="datetime-local" name="data_jogo" required>
        <br><br>

        <button type="submit">Cadastrar</button>
        <button type="submit">Voltar</button>

    </form>
</body>

</html>

<?php

require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/db/database.php";
require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/controller/JogosController.php";
require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/controller/GruposController.php";
require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/controller/SelecaoController.php";

$jogosController = new JogosController($pdo);
$gruposController = new GruposController($pdo);
$selecaoController = new SelecaoController($pdo);

$grupos = $gruposController->listar();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $grupo = $_POST['grupo_id'];
    $casa = $_POST['casa_id'];
    $fora = $_POST['fora_id'];
    $data = $_POST['data_jogo'];

    $jogosController->cadastrar($grupo, $casa, $fora, $data);


    header("Location: ../index.php");
    exit;
}
?>