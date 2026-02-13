
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/css/style.css">
    <title>Inicio</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: white;
            padding: 10px 0;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
        }

        nav ul li a:hover {
            text-decoration: underline;
        }

        section {
            
            padding: 200;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="#usuarios">Usuários</a></li>
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

$usuarioController = new UsuarioController($pdo);
$selecaoController = new SelecaoController($pdo);


$usuarios = $usuarioController->listar();
$selecoes = $selecaoController->listar();

?>