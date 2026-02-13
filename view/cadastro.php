<?php
require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/db/database.php";
require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/controller/SelecaoController.php";

$selecaoController = new SelecaoController($pdo);
$selecoes = $selecaoController->buscarSelecao();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style1.css">
    <title>Document</title>
</head>

<body>
    <div class="">
        <form method="post">

            <label for="nome">Nome:</label>
            <input type="text" name="nome" required><br>

            <label for="idade">Idade:</label>
            <input type="number" name="idade" required><br>

            <label for="selecao">Seleção representante:</label>
            <select name="selecao_id" required>
                <option value="">Selecione</option>
                <?php foreach ($selecoes as $selecao): ?>
                    <option value="<?= $selecao['id']; ?>">
                        <?= $selecao['nome']; ?>
                    </option>
                <?php endforeach; ?>
            </select>

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

            <input type="submit"><br>
            <a href="index.php" class="btn-voltar">Voltar</a>

        </form> 
    </div>
</body>

</html>

<?php


require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/controller/UsuarioController.php";



$usuarioController = new UsuarioController($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $selecao = $_POST['selecao_id'];
    $cargo = $_POST['cargo'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];


    $usuarioController->cadastrar($nome, $idade, $selecao, $cargo, $email, $senha);

    header("Location: index.php");
}


?>