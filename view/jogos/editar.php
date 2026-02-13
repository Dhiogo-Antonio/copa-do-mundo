<?php

require_once "C:/turma2/xampp/htdocs/copa-do-mundo/db/database.php";
require_once "C:/turma2/xampp/htdocs/copa-do-mundo/model/JogosModel.php";

$jogosModel = new JogosModel($pdo);

$id = $_GET['id'];

$jogo = $jogosModel->buscarPorId($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $gc = $_POST['gols_casa'];
    $gf = $_POST['gols_fora'];

    $jogosModel->finalizar($id, $gc, $gf);

    header("Location: listar.php");
    exit;
}
?>
<link rel="stylesheet" href="../css/style2.css">
<h2>Editar / Finalizar Jogo</h2>

<form method="POST">

    <p><?= $jogo['selecao_casa_id']; ?> x <?= $jogo['selecao_fora_id']; ?></p>

    <label>Gols Casa:</label>
    <input type="number" name="gols_casa" required>
    <br><br>

    <label>Gols Fora:</label>
    <input type="number" name="gols_fora" required>
    <br><br>

    <button type="submit">Salvar</button>

</form>
