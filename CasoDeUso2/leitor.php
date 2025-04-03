<?php
session_start();
include 'header.php';
include 'conexao.php';

// Simulação: Definição de um ebook (em um cenário real, os dados viriam do banco)
$ebook_id = 1; // ID do ebook sendo lido
$usuario_id = $_SESSION['usuario_id'] ?? 1; // ID do usuário autenticado

// Recuperar progresso do banco
$sql = "SELECT pagina_atual FROM progresso_leitura WHERE usuario_id = ? AND ebook_id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$usuario_id, $ebook_id]);
$progresso = $stmt->fetch();

$pagina_inicial = $progresso ? $progresso['pagina_atual'] : 1; // Se não houver progresso salvo, começa da página 1

?>

<div class="container mt-4">
    <h2 class="fw-bold text-center">📖 Leitor de Ebook</h2>

    <div class="card p-4 shadow">
        <p class="text-muted">Você parou na página: <span id="pagina-atual"><?= $pagina_inicial ?></span></p>

        <div id="conteudo-ebook" class="p-3">
            <p>📚 Página <span id="pagina-numero"><?= $pagina_inicial ?></span></p>
            <p id="texto-ebook">Conteúdo do ebook aqui...</p>
        </div>

        <div class="d-flex justify-content-between mt-3">
            <button id="pagina-anterior" class="btn btn-outline-primary">⬅ Página Anterior</button>
            <button id="pagina-proxima" class="btn btn-primary">Próxima Página ➡</button>
        </div>
    </div>
</div>

<script>
let paginaAtual = <?= $pagina_inicial ?>;
const ebookId = <?= $ebook_id ?>;

document.getElementById('pagina-anterior').addEventListener('click', () => {
    if (paginaAtual > 1) {
        paginaAtual--;
        atualizarPagina();
    }
});

document.getElementById('pagina-proxima').addEventListener('click', () => {
    paginaAtual++;
    atualizarPagina();
});

function atualizarPagina() {
    document.getElementById('pagina-numero').innerText = paginaAtual;
    document.getElementById('pagina-atual').innerText = paginaAtual;

    // Salvar progresso via AJAX
    fetch('salvar_progresso.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `ebook_id=${ebookId}&pagina_atual=${paginaAtual}`
    });
}
</script>

<?php include 'footer.php'; ?>
