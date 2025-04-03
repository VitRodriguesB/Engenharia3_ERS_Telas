<?php
include 'header.php';
?>

<div class="container">
    <h2 class="titulo">Leitura em Grupo</h2>
    
    <!-- Formulário para criação de grupos -->
    <div class="grupo-form">
        <input type="text" id="nome_grupo" placeholder="Nome do Grupo" required>
        <button class="btn-criar" type="button" onclick="criarGrupo()">Criar Grupo</button>
    </div>
    
    <h3 class="subtitulo">Grupos Disponíveis</h3>
    <div id="lista-grupos" class="lista-grupos">
        <!-- Grupos serão adicionados dinamicamente -->
    </div>
</div>

<?php include 'rodape.php'; ?>
