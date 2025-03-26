<?php
session_start();
if (!isset($_SESSION["marcacoes"])) {
    $_SESSION["marcacoes"] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["anotacao"])) {
    $_SESSION["marcacoes"][] = htmlspecialchars($_POST["anotacao"]);
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Marcação de Páginas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Marcar Página</h2>
    <form method="post">
        <textarea name="anotacao" class="form-control"></textarea>
        <button type="submit" class="btn btn-success mt-2">Salvar Marcação</button>
    </form>
    <h3 class="mt-4">Marcações Salvas:</h3>
    <ul class="list-group">
        <?php foreach ($_SESSION["marcacoes"] as $marcacao): ?>
            <li class="list-group-item"><?= $marcacao ?></li>
        <?php endforeach; ?>
    </ul>
</div>
</body>
</html>
