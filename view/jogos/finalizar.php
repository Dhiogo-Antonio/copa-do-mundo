<?php
require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/db/database.php";
require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/controller/JogosController.php";

$jogosController = new JogosController($pdo);


if (!isset($_GET['id'])) {
    die("ID do jogo não informado.");
}

$id = (int) $_GET['id'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $gols_casa = (int) $_POST['gols_casa'];
    $gols_fora = (int) $_POST['gols_fora'];

    $jogosController->finalizar($id, $gols_casa, $gols_fora);

    header("Location: ../index.php");
    exit;
}


$jogo = $jogosController->buscarPorId($id);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Finalizar Jogo</title>
</head>
<body>
<link rel="stylesheet" href="../css/style2.css">
<h2>Finalizar Jogo</h2>

<form method="POST">
    <label>Gols Casa:</label>
    <input type="number" name="gols_casa" required min="0">
    <br><br>

    <label>Gols Fora:</label>
    <input type="number" name="gols_fora" required min="0">
    <br><br>

    <button type="submit">Finalizar</button>
    <br>
<a href="../index.php">Voltar</a>
</form>



</body>
</html>
