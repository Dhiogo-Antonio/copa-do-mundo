<?php

require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/db/database.php";
require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/model/JogoModel.php";

$jogosModel = new JogosModel($pdo);

$id = $_GET['id'];

$jogoModel->deletar($id);

header("Location: listar.php");
exit;
