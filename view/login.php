<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style2.css">
    <title>Document</title>
</head>
<body>
     <link rel="stylesheet" href="css/style1.css">
    <div>
    <form method="post">
     <label for="email">E-mail:</label>
    <input type="email" name="email" required><br>

    <label for="senha">Senha:</label>
    <input type="password" name="senha" required><br>

    <input type="submit">
    </form>
    </div>
</body>
</html>

<?php

require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/controller/UsuarioController.php";
require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/db/database.php";

$usuarioController = new UsuarioController($pdo);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
$email = $_POST['email'];  
$senha = $_POST['senha'];

$usuarioController->login($email, $senha);

if($usuarioController->login($email, $senha)){
    header("Location:index.php");
    exit();
} else {
    echo "Email ou senha incorreto.";
}
}

?>