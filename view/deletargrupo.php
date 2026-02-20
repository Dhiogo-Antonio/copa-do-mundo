<?php
require_once "C:/turma2/xampp/htdocs/copa-do-mundo/db/database.php";
require_once "C:/turma2/xampp/htdocs/copa-do-mundo/controller/GruposController.php";

$grupoController = new GruposController($pdo);

$id = $_GET['id'] ?? null;

if(!$id){
    die("ID inválido");
}

$grupoController->deletar($id);

header("Location: index.php");
exit;
