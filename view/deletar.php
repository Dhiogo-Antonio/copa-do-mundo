<?php
require_once "C:/turma2/xampp/htdocs/copa-do-mundo/db/database.php";
require_once "C:/turma2/xampp/htdocs/copa-do-mundo/controller/UsuarioController.php";

$usuarioController = new UsuarioController($pdo);

$id = $_GET['id'] ?? null;

if(!$id){
    die("ID inválido");
}

$usuarioController->deletar($id);

header("Location: index.php");
exit;
