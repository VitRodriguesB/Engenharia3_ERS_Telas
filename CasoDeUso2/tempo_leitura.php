<link rel="stylesheet" href="tempo_leitura.css">
<?php include 'header.php'; ?>

<div class="container">
    <h2 class="titulo">⏳ Estimativa de Tempo de Leitura</h2>
    
    <div class="tempo-form">
        <input type="number" id="total_paginas" placeholder="Total de Páginas" min="1" required>
        <input type="number" id="tempo_por_pagina" placeholder="Tempo Médio por Página (min)" min="1" required>
        <button class="btn-calcular" type="button" onclick="calcularTempo()">Calcular Tempo</button>
    </div>

    <h3 class="subtitulo">⏱ Tempo Restante:</h3>
    <p id="resultado" class="resultado">Informe os valores acima para calcular.</p>
</div>

<?php include 'footer.php'; ?>

<script>
    function calcularTempo() {
        let totalPaginas = parseInt(document.getElementById('total_paginas').value);
        let tempoPorPagina = parseInt(document.getElementById('tempo_por_pagina').value);

        if (isNaN(totalPaginas) || isNaN(tempoPorPagina) || totalPaginas <= 0 || tempoPorPagina <= 0) {
            document.getElementById('resultado').innerText = "⚠️ Insira valores válidos.";
            document.getElementById('resultado').style.color = "red";
            return;
        }

        let tempoTotal = totalPaginas * tempoPorPagina;
        let horas = Math.floor(tempoTotal / 60);
        let minutos = tempoTotal % 60;

        let resultado = horas > 0 
            ? `📖 ${horas}h ${minutos}min restantes.` 
            : `📖 ${minutos} minutos restantes.`;

        document.getElementById('resultado').innerText = resultado;
        document.getElementById('resultado').style.color = "#007bff";
    }
</script>
