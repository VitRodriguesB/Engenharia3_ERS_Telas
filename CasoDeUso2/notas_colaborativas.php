<?php
session_start();
if (!isset($_SESSION["notas"])) {
    $_SESSION["notas"] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["nota"])) {
    $_SESSION["notas"][] = htmlspecialchars($_POST["nota"]);
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Notas Colaborativas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2>Notas Colaborativas</h2>
    <form method="post">
        <textarea name="nota" class="form-control"></textarea>
        <button type="submit" class="btn btn-success mt-2">Adicionar Nota</button>
    </form>
    <h3 class="mt-4">Notas Salvas:</h3>
    <ul class="list-group">
        <?php foreach ($_SESSION["notas"] as $nota): ?>
            <li class="list-group-item"><?= $nota ?></li>
        <?php endforeach; ?>
    </ul>
</div>
</body>
</html>
