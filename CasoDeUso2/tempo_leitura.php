<?php
$tempo_por_pagina = 30;
$paginas_restantes = 10;
$tempo_estimado = $paginas_restantes * $tempo_por_pagina;
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Tempo de Leitura</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2>Estimativa de Tempo de Leitura</h2>
    <p>Páginas restantes: <strong><?= $paginas_restantes ?></strong></p>
    <p>Tempo estimado: <strong><?= $tempo_estimado ?> segundos</strong></p>
</div>

</body>
</html>
