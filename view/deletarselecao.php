<?php
require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/db/database.php";
require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/controller/SelecaoController.php";

$selecaoController = new SelecaoController($pdo);

$id = $_GET['id'] ?? null;

if(!$id){
    die("ID inválido");
}

$selecaoController->deletar($id);

header("Location: index.php");
exit;
