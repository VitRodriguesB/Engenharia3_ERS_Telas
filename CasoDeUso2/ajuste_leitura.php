<?php
session_start();
$cor_fundo = $_SESSION['cor_fundo'] ?? 'white';
$cor_texto = $_SESSION['cor_texto'] ?? 'black';
$tamanho_fonte = $_SESSION['tamanho_fonte'] ?? '16px';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['cor_fundo'] = $_POST['cor_fundo'];
    $_SESSION['cor_texto'] = $_POST['cor_texto'];
    $_SESSION['tamanho_fonte'] = $_POST['tamanho_fonte'];
    header("Location: " . $_SERVER["PHP_SELF"]);
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Ajuste de Leitura</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: <?= $cor_fundo ?>; color: <?= $cor_texto ?>; font-size: <?= $tamanho_fonte ?>;">

<div class="container mt-5">
    <h2>Ajuste de Leitura</h2>
    <form method="post">
        <label>Cor de Fundo:</label>
        <input type="color" name="cor_fundo" value="<?= $cor_fundo ?>" class="form-control">
        <label>Cor do Texto:</label>
        <input type="color" name="cor_texto" value="<?= $cor_texto ?>" class="form-control">
        <label>Tamanho da Fonte:</label>
        <select name="tamanho_fonte" class="form-control">
            <option value="14px" <?= ($tamanho_fonte == '14px') ? 'selected' : '' ?>>Pequena</option>
            <option value="16px" <?= ($tamanho_fonte == '16px') ? 'selected' : '' ?>>Média</option>
            <option value="18px" <?= ($tamanho_fonte == '18px') ? 'selected' : '' ?>>Grande</option>
        </select>
        <button type="submit" class="btn btn-primary mt-3">Salvar Preferências</button>
    </form>
</div>

</body>
</html>
