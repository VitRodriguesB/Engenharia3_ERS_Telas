<?php
session_start();
$pagina_atual = $_SESSION["pagina_atual"] ?? 1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["pagina_atual"] = $_POST["pagina"];
    header("Location: " . $_SERVER["PHP_SELF"]);
    exit();
}
?>
<?php include 'header.php'; ?>
<h2>Salvar Progresso de Leitura</h2>
<form method="post">
    <label>Página Atual:</label>
    <input type="number" name="pagina" value="<?= $pagina_atual ?>" class="form-control">
    <button type="submit" class="btn btn-primary mt-2">Salvar Progresso</button>
</form>
<p class="mt-3">Última página salva: <strong><?= $pagina_atual ?></strong></p>
<?php include 'footer.php'; ?>
