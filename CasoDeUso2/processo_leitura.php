<?php
session_start();
$pagina_atual = $_SESSION["pagina_atual"] ?? 1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["pagina_atual"] = $_POST["pagina"];
    header("Location: " . $_SERVER["PHP_SELF"]);
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Salvamento de Progresso</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Salvar Progresso de Leitura</h2>
    <form method="post">
        <label>Página Atual:</label>
        <input type="number" name="pagina" value="<?= $pagina_atual ?>" class="form-control">
        <button type="submit" class="btn btn-primary mt-2">Salvar Progresso</button>
    </form>
    <p class="mt-3">Última página salva: <strong><?= $pagina_atual ?></strong></p>
</div>
</body>
</html>
