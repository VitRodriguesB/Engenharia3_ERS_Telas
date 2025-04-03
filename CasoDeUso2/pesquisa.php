<?php 
session_start();
include 'header.php';

// Simulando um "banco de dados" com ebooks e conteúdo fictício
$ebooks = [
    ["titulo" => "Programação em PHP", "conteudo" => "PHP é uma linguagem poderosa para desenvolvimento web."],
    ["titulo" => "Banco de Dados MySQL", "conteudo" => "O MySQL é um dos bancos de dados mais utilizados no mundo."],
    ["titulo" => "Desenvolvimento Web", "conteudo" => "HTML, CSS e JavaScript são fundamentais para a web."],
    ["titulo" => "Algoritmos e Estruturas de Dados", "conteudo" => "O estudo de algoritmos melhora a lógica de programação."],
];

// Verifica se foi feita uma pesquisa
$resultados = [];
$termoPesquisa = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['termo'])) {
    $termoPesquisa = strtolower(trim($_POST['termo']));

    foreach ($ebooks as $ebook) {
        if (strpos(strtolower($ebook["titulo"]), $termoPesquisa) !== false || 
            strpos(strtolower($ebook["conteudo"]), $termoPesquisa) !== false) {
            
            // Destacar o termo pesquisado nos resultados
            $tituloDestacado = str_ireplace($termoPesquisa, "<mark>$termoPesquisa</mark>", $ebook["titulo"]);
            $conteudoDestacado = str_ireplace($termoPesquisa, "<mark>$termoPesquisa</mark>", $ebook["conteudo"]);

            $resultados[] = ["titulo" => $tituloDestacado, "conteudo" => $conteudoDestacado];
        }
    }
}
?>

<div class="container mt-4">
    <h2 class="fw-bold text-center">🔍 Pesquisa de Ebooks</h2>
    <p class="text-muted text-center">Busque por palavras-chave nos ebooks disponíveis.</p>

    <div class="card shadow p-4">
        <form method="POST">
            <div class="input-group">
                <input type="text" name="termo" class="form-control" placeholder="Digite um termo..." required value="<?= htmlspecialchars($termoPesquisa) ?>">
                <button type="submit" class="btn btn-primary">🔎 Pesquisar</button>
            </div>
        </form>
    </div>

    <h4 class="mt-5">📚 Resultados</h4>
    <div class="list-group">
        <?php if (!empty($resultados)): ?>
            <?php foreach ($resultados as $resultado): ?>
                <div class="list-group-item">
                    <h5 class="fw-bold"><?= $resultado['titulo'] ?></h5>
                    <p class="text-muted"><?= $resultado['conteudo'] ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-muted">Nenhum resultado encontrado.</p>
        <?php endif; ?>
    </div>
</div>

<?php include 'rodape.php'; ?>
