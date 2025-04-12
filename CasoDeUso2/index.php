<?php include 'header.php'; ?>

<div class="text-center mb-5">
    <h2 class="fw-bold">Bem-vindo ao Sistema de Leitura 📖</h2>
    <p class="text-muted">Explore os recursos abaixo para melhorar sua experiência de leitura.</p>
</div>

<div class="row g-4 justify-content-center">
    <?php
    $features = [
        ["Ajuste de Leitura", "📖", "ajuste_leitura.php"],
        ["Pesquisa", "🔍", "pesquisa.php"],
        ["Análise de Tempo", "⏳", "tempo_leitura.php"],
        ["Notas Colaborativas", "📝", "notas_colaborativas.php"],
        ["Leitura em Grupo", "👥", "leitura_grupo.php"],
        ["Marcação de Páginas", "📌", "marcacao_paginas.php"],
        ["Salvamento de Progresso", "💾", "processo_leitura.php"]
    ];

    foreach ($features as $feature) {
        echo "
                <div class='col-md-4'>
                    <a href='{$feature[2]}' class='card-link'>
                        <div class='card feature-card text-center'>
                            <div class='card-body'>
                                <span class='icon'>{$feature[1]}</span>
                                <h5 class='card-title mt-3'>{$feature[0]}</h5>
                            </div>
                        </div>
                    </a>
                </div>";
                }
    ?>
</div>

<?php include 'footer.php'; ?>