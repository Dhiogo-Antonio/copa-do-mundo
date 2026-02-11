<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Cadastrar Grupo</h2>

<form method="POST">
    <input type="number" name="nome" required>
    <button type="submit" name="sortear">Cadastrar</button>
</form>
</body>
</html>

<?php 

require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/controller/GruposController.php";
require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/db/database.php";

$gruposController = new GruposController($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];

    
    $gruposController->cadastrar($nome);
}

?>