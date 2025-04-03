<?php 
session_start(); 
include 'header.php'; 

// Inicializa as configurações padrão caso não existam
if (!isset($_SESSION['config_leitura'])) {
    $_SESSION['config_leitura'] = [
        'cor_fundo' => '#ffffff',
        'cor_fonte' => '#000000',
        'tamanho_fonte' => '16px'
    ];
}

// Se o formulário for enviado, salva as novas configurações
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['config_leitura'] = [
        'cor_fundo' => $_POST['cor_fundo'],
        'cor_fonte' => $_POST['cor_fonte'],
        'tamanho_fonte' => $_POST['tamanho_fonte'] . 'px'
    ];
}

$config = $_SESSION['config_leitura'];
?>

<div class="container mt-4">
    <h2 class="fw-bold text-center">📖 Ajuste de Leitura</h2>
    <p class="text-muted text-center">Personalize sua experiência de leitura.</p>

    <div class="card shadow p-4">
        <form method="POST">
            <div class="mb-3">
                <label class="form-label fw-bold">🎨 Cor do Fundo</label>
                <input type="color" name="cor_fundo" class="form-control form-control-color" value="<?= $config['cor_fundo'] ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">🖋 Cor da Fonte</label>
                <input type="color" name="cor_fonte" class="form-control form-control-color" value="<?= $config['cor_fonte'] ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">🔠 Tamanho da Fonte</label>
                <select name="tamanho_fonte" class="form-select" required>
                    <?php 
                    $tamanhos = ['14', '16', '18', '20', '22', '24'];
                    foreach ($tamanhos as $tamanho) {
                        $selected = ($config['tamanho_fonte'] == $tamanho . 'px') ? 'selected' : '';
                        echo "<option value='$tamanho' $selected>{$tamanho}px</option>";
                    }
                    ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-100">💾 Salvar Ajustes</button>
        </form>
    </div>

    <h4 class="mt-5 text-center">📚 Prévia da Leitura</h4>
    <div id="preview" class="preview-box mt-3 p-3">
        <p>“A leitura é para o intelecto o que o exercício é para o corpo.”</p>
    </div>
</div>

<script>
    // Aplica as configurações de leitura na prévia
    document.getElementById('preview').style.backgroundColor = "<?= $config['cor_fundo'] ?>";
    document.getElementById('preview').style.color = "<?= $config['cor_fonte'] ?>";
    document.getElementById('preview').style.fontSize = "<?= $config['tamanho_fonte'] ?>";
</script>

<?php include 'rodape.php'; ?>
