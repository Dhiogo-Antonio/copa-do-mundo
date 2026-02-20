<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style2.css">
    <title>Cadastrar Grupo</title>
</head>
<body>

<form method="POST">
    <input type="text" name="nome" required>
    <button type="submit" name="sortear">Cadastrar</button>
     <a href="index.php">Voltar</a>
</form>
</body>
</html>

<?php 

require_once "C:/turma2/xampp/htdocs/copa-do-mundo/controller/GruposController.php";
require_once "C:/turma2/xampp/htdocs/copa-do-mundo/db/database.php";

$gruposController = new GruposController($pdo);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $resultado = $gruposController->cadastrar($_POST['nome']);

    if($resultado === "duplicado"){
        echo "<script>alert('Já existe um grupo com esse nome!');</script>";
    } else {
        header("Location: index.php");
        exit;
    }
}


?>


