<?php
$texto_ebook = "Este é um exemplo de texto de ebook para demonstrar a funcionalidade de pesquisa.";
$resultado = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $termo = $_POST["termo"];
    if (strpos(strtolower($texto_ebook), strtolower($termo)) !== false) {
        $resultado = "🔍 Termo encontrado!";
    } else {
        $resultado = "❌ Termo não encontrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Pesquisa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2>Pesquisar no Ebook</h2>
    <form method="post">
        <input type="text" name="termo" class="form-control" placeholder="Digite a palavra-chave...">
        <button type="submit" class="btn btn-primary mt-3">Pesquisar</button>
    </form>

    <?php if ($resultado): ?>
        <div class="alert alert-info mt-3"><?= $resultado ?></div>
    <?php endif; ?>
</div>

</body>
</html>
