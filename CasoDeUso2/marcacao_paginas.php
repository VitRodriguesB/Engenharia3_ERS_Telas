<?php 
session_start(); 
include 'header.php'; 

// Inicializa a sessão para armazenar marcações se não existir
if (!isset($_SESSION['marcacoes'])) {
    $_SESSION['marcacoes'] = [];
}

// Se o formulário for enviado, salva a marcação
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pagina'])) {
    $pagina = htmlspecialchars($_POST['pagina']);
    $anotacao = htmlspecialchars($_POST['anotacao'] ?? "");

    // Evita marcações duplicadas
    if (!array_key_exists($pagina, $_SESSION['marcacoes'])) {
        $_SESSION['marcacoes'][$pagina] = $anotacao;
    }
}

// Se o usuário deseja remover uma marcação
if (isset($_GET['remover'])) {
    $pagina_remover = $_GET['remover'];
    unset($_SESSION['marcacoes'][$pagina_remover]);
}
?>

<div class="container mt-4">
    <h2 class="fw-bold text-center">📌 Marcação de Páginas</h2>
    <p class="text-muted text-center">Marque páginas importantes e adicione anotações.</p>

    <div class="card shadow p-4">
        <form method="POST">
            <div class="mb-3">
                <label class="form-label fw-bold">Número da Página</label>
                <input type="number" name="pagina" class="form-control" required min="1">
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Anotação (Opcional)</label>
                <textarea name="anotacao" class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">📌 Marcar Página</button>
        </form>
    </div>

    <h4 class="mt-5">📖 Páginas Marcadas</h4>
    <div class="list-group">
        <?php if (!empty($_SESSION['marcacoes'])): ?>
            <?php foreach ($_SESSION['marcacoes'] as $pagina => $anotacao): ?>
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>Página <?= $pagina ?></strong>
                        <p class="mb-0 text-muted"><?= !empty($anotacao) ? $anotacao : "Sem anotação" ?></p>
                    </div>
                    <a href="?remover=<?= $pagina ?>" class="btn btn-danger btn-sm">❌ Remover</a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-muted">Nenhuma página marcada ainda.</p>
        <?php endif; ?>
    </div>
</div>

<?php include 'rodape.php'; ?>
