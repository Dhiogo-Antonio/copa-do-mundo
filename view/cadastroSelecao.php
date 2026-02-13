<?php
require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/db/database.php";
require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/controller/GruposController.php";

$gruposController = new GruposController($pdo);

$grupos = $gruposController->listar();


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <link rel="stylesheet" href="css/style1.css">
    <h2>Cadastrar Seleção</h2>

<form method="post">

    <label>Nome:</label>
    <input type="text" name="nome" required><br>

    <label>Continente:</label>
    <input type="text" name="continente" required><br>

   <select name="grupo_id" required>
    <option value="">Selecione</option>
    <?php foreach ($grupos as $grupo): ?>
        <option value="<?= $grupo['id']; ?>">
            Grupo <?= $grupo['nome']; ?>
        </option>
    <?php endforeach; ?>
</select>

    <input type="submit" value="Cadastrar">

</form>

</table>
</body>
</html>

<?php 

require_once "C:/Turma2/xampp/htdocs/copa-do-mundo/controller/SelecaoController.php";

$selecaoController = new SelecaoController($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
  $nome = $_POST['nome'];
  $continente = $_POST['continente'];
  $grupo_id = intval($_POST['grupo_id']);
  

  $selecaoController->cadastrar($nome, $continente, $grupo_id);

}

?>