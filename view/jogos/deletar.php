<?php
require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/db/database.php";
require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/controller/JogosController.php";

$jogosController = new JogosController($pdo);

$id = $_GET['id'] ?? null;

if (!$id) {
    die("ID inválido");
}

$jogosController->deletar((int)$id);

header("Location: ../index.php");
exit;
