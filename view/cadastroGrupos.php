<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style1.css">
    <title>Cadastrar Grupo</title>
</head>
<body>

<form method="POST">
    <input type="number" name="nome" required>
    <button type="submit" name="sortear">Cadastrar</button>
</form>
</body>
</html>

<?php 

require_once "C:/turma2/xampp/htdocs/copa-do-mundo/controller/GruposController.php";
require_once "C:/turma2/xampp/htdocs/copa-do-mundo/db/database.php";

$gruposController = new GruposController($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];

    
    $gruposController->cadastrar($nome);
}

?>