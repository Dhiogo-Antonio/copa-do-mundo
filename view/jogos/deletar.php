<?php
require_once __DIR__ . "/../../db/database.php";
require_once __DIR__ . "/../../model/JogosModel.php";

$jogosModel = new JogosModel($pdo);

$id = (int) $_GET['id'];

$jogosModel->deletar($id);

header("Location: ../index.php");
exit;
?>