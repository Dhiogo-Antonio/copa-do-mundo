<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
    <form method="post">

    <label for="nome">Nome:</label>
    <input type="text" name="nome" required><br>

    <label for="idade">Idade:</label>
    <input type="number" name="idade" required><br>

    <label for="selecao">Seleção representante:</label>
    <input type="text" name="selecao" required><br>

    <select name="cargo" id="cargo">
     <option value="Jogador">Jogador</option>
     <option value="Técnico">Técnico</option>
     <option value="Arbito">Arbito</option>
     <option value="Bandeira">Bandeira</option>
    </select>

    <label for="email">E-mail:</label>
    <input type="text" name="email" required><br>

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
    
$nome = $_POST['nome'];  
$idade = $_POST['idade']; 
$selecao = $_POST['selecao'];   
$cargo = $_POST['cargo'];   
$email = $_POST['email'];
$senha = $_POST['senha'];

$usuarioController->cadastrar($nome, $idade, $selecao, $cargo, $email, $senha);
}
?>