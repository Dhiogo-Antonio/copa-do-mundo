<?php
require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/db/database.php";
require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/controller/UsuarioController.php";
require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/controller/SelecaoController.php";

$selecaoController = new SelecaoController($pdo);


$usuarioController = new UsuarioController($pdo);

$selecoes = $selecaoController->buscarSelecao();

$id = $_GET['id'] ?? null;

if (!$id) {
    die("ID inválido");
}

$usuario = $usuarioController->buscar($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuarioController->atualizar(
        $id,
        $_POST['nome'],
        $_POST['idade'],
        $_POST['selecao_id'],
        $_POST['cargo'],
        $_POST['email']
    );

    header("Location: index.php");
    exit;
}
?>

<link rel="stylesheet" href="css/style2.css">



<form method="POST">
    Nome: <input type="text" name="nome" value="<?= $usuario['nome'] ?>"><br><br>

    Idade: <input type="number" name="idade" value="<?= $usuario['idade'] ?>"><br><br>

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
    Email: <input type="email" name="email" value="<?= $usuario['email'] ?>"><br><br>

    <button type="submit">Atualizar</button>
    <a href="index.php" class="btn-voltar">Voltar</a>
</form>