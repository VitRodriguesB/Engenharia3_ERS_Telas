<?php
session_start();
$pagina_atual = $_SESSION["pagina_atual"] ?? 1;
?>

<?php include 'header.php'; ?>

<h2>Salvar Progresso de Leitura</h2>
<form id="progresso-form">
    <label>Página Atual:</label>
    <input type="number" name="pagina" id="pagina" value="<?= $pagina_atual ?>" class="form-control">
    <button type="button" class="btn btn-primary mt-2" onclick="salvarProgresso()">Salvar Progresso</button>
</form>
<p class="mt-3">Última página salva: <strong id="ultima-pagina"><?= $pagina_atual ?></strong></p>

<script>
function salvarProgresso() {
    let pagina = document.getElementById("pagina").value;

    fetch("salvar_progresso.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "pagina=" + encodeURIComponent(pagina)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.mensagem);
            document.getElementById("ultima-pagina").innerText = pagina;
        }
    })
    .catch(error => console.error("Erro ao salvar progresso:", error));
}
</script>

<?php include 'footer.php'; ?>
