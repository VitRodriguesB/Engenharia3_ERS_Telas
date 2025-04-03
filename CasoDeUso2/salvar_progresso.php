<?php
session_start();
include 'conexao.php'; // Arquivo que contém a conexão com o banco

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario_id = $_SESSION['usuario_id']; // Supondo que o usuário já esteja autenticado
    $ebook_id = $_POST['ebook_id'];
    $pagina_atual = $_POST['pagina_atual'];

    // Verifica se já existe um progresso salvo para esse usuário e ebook
    $sql = "SELECT * FROM progresso_leitura WHERE usuario_id = ? AND ebook_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$usuario_id, $ebook_id]);
    $progresso = $stmt->fetch();

    if ($progresso) {
        // Atualiza a página já salva
        $sql = "UPDATE progresso_leitura SET pagina_atual = ? WHERE usuario_id = ? AND ebook_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$pagina_atual, $usuario_id, $ebook_id]);
    } else {
        // Insere um novo progresso
        $sql = "INSERT INTO progresso_leitura (usuario_id, ebook_id, pagina_atual) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$usuario_id, $ebook_id, $pagina_atual]);
    }

    echo json_encode(["success" => true]);
}
?>
