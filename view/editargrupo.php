<?php
require_once "C:/turma2/xampp/htdocs/copa-do-mundo/db/database.php";
require_once "C:/turma2/xampp/htdocs/copa-do-mundo/controller/GruposController.php";

$gruposController = new GruposController($pdo);



$id = $_GET['id'] ?? null;

if(!$id){
    die("ID inválido");
}

$grupo = $gruposController->buscar($id);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $resultado = $gruposController->atualizar($_POST['id'], $_POST['nome']);

   if($resultado === "duplicado"){
        echo "<script>alert('Já existe um grupo com esse nome!');</script>";
    } else {
        header("Location: index.php");
        exit;
    }
}

?>

<head>
    <title>Editar Grupo</title>
</head>

<link rel="stylesheet" href="css/style2.css">


<form method="POST">
    <input type="hidden" name="id" value="<?= $grupo['id'] ?>">

    Nome: 
    <input type="text" name="nome" value="<?= $grupo['nome'] ?>" required>
    <br><br>

    <button type="submit">Atualizar</button>
    <a href="index.php" class="btn-voltar">Voltar</a>
</form>
