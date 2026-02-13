
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="fundo-colorido">
    <header>
        <nav>
            <ul>
                <li><a href="#">Usuários</a></li>
                <li><a href="#">Seleções e grupos</a></li>
                <li><a href="#">Classificação</a></li>
                <li><a href="#">Jogos</a></li>
            </ul>
        </nav>
    </header>

    <section class="usuarios" id="usuarios">


    </section>
    </div>
</body>
</html>

<?php
require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/db/database.php";
require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/controller/UsuarioController.php";
require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/controller/SelecaoController.php";

$usuarioController = new UsuarioController($pdo);
$selecaoController = new SelecaoController($pdo);


$usuarios = $usuarioController->listar();
$selecoes = $selecaoController->listar();

?>