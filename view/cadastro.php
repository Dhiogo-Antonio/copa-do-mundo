<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
    <form method="post">

    <label for="nome">Nome:</label>
    <input type="text" name="nome" required><br>

    <label for="idade">Idade:</label>
    <input type="number" name="idade" required><br>

    <label for="selecao">Seleção epresentante:</label>
    <input type="text" name="selecao" required><br>

    <select name="cargo" id="cargo">
     <option value="">Cargo</option>
     <option value="">Jogador</option>
     <option value="">Técnico</option>
     <option value="">Arbito</option>
     <option value="">Bandeira</option>
    </select>

    <label for="email">E-mail:</label>
    <input type="text" name="email" required><br>

    <label for="senha">Senha:</label>
    <input type="password" name="senha" required><br>

    <input type="submit">

    </form>
    </div>
</body>
</html>