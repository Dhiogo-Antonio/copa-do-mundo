
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <header class="fundo-colorido">
        <div class="logo">
        <img src="../img/logo-fifa.webp" alt="">
        </div>
        
        <div class="navegacao">
        <h1>Copa do Mundo</h1>
    
        <nav>
            <ul>
                <li><a href="#usuarios">Usuários</a></li>
                <li><a href="#selecoes">Seleções e Grupos</a></li>
                <li><a href="#classificacao">Classificação</a></li>
                <li><a href="#jogos">Jogos</a></li>
            </ul>
        </nav>
        </div>
    </header>

    
<section class="boas-vindas">
    <div class="container">
        <h1>Bem-vindo a Copa do Mundo 2026</h1>
        <p>
            Aqui você poderá acompanhar usuários, seleções, classificações e jogos de forma rápida e interativa.
        </p>
        <p>
            Explore os dados, confira os destaques e fique por dentro de todas as novidades do maior evento de futebol do planeta!
        </p>

        <a href="#usuarios" class="btn-explorar">Explorar Dashboard</a>
    </div>
</section>


   
</body>
</html>

<?php
require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/db/database.php";
require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/controller/UsuarioController.php";
require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/controller/SelecaoController.php";
require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/controller/JogosController.php";
require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/controller/ClassificacaoController.php";

$usuarioController = new UsuarioController($pdo);
$selecaoController = new SelecaoController($pdo);
$jogosController = new JogosController($pdo);
$classificacaoController = new ClassificacaoController($pdo);

$usuarios = $usuarioController->listar();
$selecoes = $selecaoController->listar();
$jogos = $jogosController->listar();
$classificacao = $classificacaoController->casa();
?>