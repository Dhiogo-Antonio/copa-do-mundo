
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
</body>
</html>

<?php
require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/db/database.php";
require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/controller/UsuarioController.php";
require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/controller/SelecaoController.php";
require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/controller/JogosController.php";


$usuarioController = new UsuarioController($pdo);
$selecaoController = new SelecaoController($pdo);
$jogosController = new JogosController($pdo);


$usuarios = $usuarioController->listar();
$selecoes = $selecaoController->listar();
$jogos = $jogosController->listar();

?>