<?php
session_start();
if (!isset($_SESSION["notas"])) {
    $_SESSION["notas"] = [];
}

// Adiciona nota
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nota"]) && !empty($_POST["nota"])) {
    $_SESSION["notas"][] = htmlspecialchars($_POST["nota"]);
}

// Remove nota
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["remover"])) {
    $indice = $_POST["remover"];
    if (isset($_SESSION["notas"][$indice])) {
        array_splice($_SESSION["notas"], $indice, 1);
    }
}

include 'header.php'; // Inclui a navbar fixa
?>

<div class="container mt-5">
    <div class="card shadow-sm p-4">
        <h2 class="text-center text-primary">Notas Colaborativas</h2>
        
        <!-- Formulário de Adição de Nota -->
        <form method="post" class="mt-3">
            <label for="nota" class="form-label fw-bold">Adicionar uma Nota:</label>
            <textarea name="nota" id="nota" class="form-control" rows="3" placeholder="Digite sua nota..." required></textarea>
            <button type="submit" class="btn btn-success mt-2 w-100">Adicionar Nota</button>
        </form>

        <!-- Lista de Notas Salvas -->
        <h3 class="mt-4 text-secondary">Notas Salvas:</h3>
        <ul class="list-group mt-2">
            <?php foreach ($_SESSION["notas"] as $indice => $nota): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center bg-light border-left border-primary">
                    <span class="fw-bold text-dark"><?= $nota ?></span>
                    <form method="post" class="d-inline">
                        <input type="hidden" name="remover" value="<?= $indice ?>">
                        <button type="submit" class="btn btn-danger btn-sm">Remover</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<?php include 'rodape.php'; ?> <!-- Adiciona o rodapé -->
